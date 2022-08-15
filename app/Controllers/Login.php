<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController
{
    public $loginmodel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->loginmodel = new LoginModel();
        $this->session = session();

    }

    public function index()
    {
        $data = [];
        $data['validation'] = null;
        $data['loginButton'] = null;
        if($this->session->has('logged_user'))
            return redirect()->to(base_url() . '/Dashboard');

        $data = [
            "page_title" => "Electrogati » Login to your account",
            "page" => "login"
        ];
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|valid_email',
                'pass' => 'required|min_length[6]|max_length[16]',
            ];

            if ($this->validate($rules)) {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('pass');

                $throttler = \config\Services::throttler();
                $allow = $throttler->check("login",4,MINUTE);

                if ($allow) {
                    $userdata = $this->loginmodel->verifyEmail($email);
                    if ($userdata) {
                        if (password_verify($password, $userdata['password'])) {
                            if ($userdata['status'] == 'active') {
                                # Resend actioavtion link..
                                 $loginInfo = [
                                    'uniid' => $userdata['uniid'],
                                    'agent' => $_SERVER['HTTP_USER_AGENT'],
                                    'ip' => $_SERVER['REMOTE_ADDR'],
                                    'login_time' => date('Y-m-d h:i:s'),
                                ];

                                $la_id = $this->loginmodel->saveLoginInfo($loginInfo);
                                if ($la_id) {
                                    $this->session->set('logged_info', $la_id);
                                }

                                $this->session->set('logged_user', $userdata['uniid']);
                                return redirect()->to(base_url() . '/Dashboard');
                            } else {
                                $data['error'] = 'Please activate your account.Contact admin';

                                // $this->session->setTempdata('error', 'Please activate your account.Contact admin', 3);
                                // return redirect()->to(current_url());
                            }
                        } else {
                            $data['error'] = 'Sorry! Wrong Password';

                            // $this->session->setTempdata('error', 'Sorry! Wrong Password', 3);
                            // return redirect()->to(current_url());
                        }
                    } else {
                        $data['error'] = 'Sorry! Email Does Not Exists';

                        // $this->session->setTempdata('error', 'Sorry! Email Dose Not Exists', 3);
                        // return redirect()->to(current_url());
                    }
                } else {
                    $data['error'] = 'Maximum Number of attempts. Try again after a minute';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view("login_view", $data);
    }

    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser();
        } elseif ($agent->isRobot()) {
            $currentAgent = $this->$agent->robot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }


        return $currentAgent;

        echo $agent->getPlatform();
    }

    function getClientIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //Checking IP From Shared Internet
        {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To Check IP is Pass From Proxy
        {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function forgot_password()
    {
        $data = [
            "page_title" => "Electrogati » Forgot Password",
            "page" => "forgot"
        ];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => [
                    'lebel' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} field required',
                        'valid_email' => 'valid {field} required'
                    ]
                ],

            ];
            if ($this->validate($rules)) {
                $email = $this->request->getVar('email', FILTER_SANITIZE_STRING);
                $userdata = $this->loginmodel->verifyEmail($email);
                if (!empty($userdata)) {
                    if ($this->loginmodel->updatedAt($userdata['uniid'])) {
                        $to = $email;
                        $subject = 'Electrogati » Forgot Password Link';
                        $token = $userdata['uniid'];
                        $message = 'Hi' . $userdata['username'] . '<br><br>'
                            . 'your reset password request has been received. Plese Click'
                            . 'the below link to reset your password.<br><br>'
                            . '<a href="' . base_url() . '/login/reset_password/' . $token . '"> Click Here </a>'
                            . 'Thank You <br> Team Electrogati ';
                        $email = \config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('mrjayseng@gmail.com', 'Electrogati');
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        if ($email->send()) {
                            session()->setTempdata('success', 'Reset passeprd link sent tp your rewgisterd Email Address . Plese verify with in 15 mins', 3);
                            return redirect()->to(current_url());
                        } else {
                            $data = $email->printDebugger(['header']);
                            print_r($data);
                        }
                    } else {
                        $this->session->setTempdata('error', 'Sorry Unable to update, Try again', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setTempdata('error', 'Email Dose Not Exists', 3);
                    return redirect()->to(current_url());
                }
            } else {

                $data['validation'] = $this->validator;
            }
        }

        return view("forgot_password_view", $data);
    }

    public function reset_password($token = null)
    {
        $data = [
            "page_title" => "Electrogati » Forgot Password",
        ];

        if (!empty($token)) {
            $userdata = $this->loginmodel->verifyToken($token);
            //   echo "<pre>";
            //  print_r($userdata);
            if (!empty($userdata)) {
                if ($this->checkExpiryDate($userdata[0]['updated_at'])) {
                    if ($this->request->getMethod() == 'post') {
                        $rules = [
                            'pwd' => [
                                'lebel' => 'Email',
                                'rules' => 'required|min_length[6]|max_length[16]',
                                'cpwd' => [
                                    'lebel' => 'Confirm Password',
                                    'rules' => 'required|matches[pwd]'
                                ]
                            ],

                        ];
                        if ($this->validate(($rules))) {

                            $pwd = password_hash($this->request->getvar('pwd'), PASSWORD_DEFAULT);
                            if ($this->loginmodel->updatePassword($token, $pwd)) {
                                session()->setTempdata('success', 'Password Updated Successflly, Login with new password', 3);
                                return redirect()->to(base_url() . '/login');
                            } else {
                                session()->setTempdata('error', 'Soprry Unable to Update Password , Try Again', 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            $data['validation'] = $this->validator;
                        }
                    }
                } else {
                    $data['error'] = 'Sorry! Reset Password link was expired';
                }
            } else {

                $data['error'] = 'Sorry! Unable to find user Account';
            }
        } else {
            $data['error'] = 'Sorry! Unauthorized Access';
        }
        echo view("reset_password_view", $data);
    }

    public function checkExpiryDate($time)
    {

        $timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);

        //$update_time = strtotime($time);
        //  $current_time = time();
        //$timeDiff = ($current_time - $update_time)/60;
        //  $timeDiff = ($current_time - $update_time)/60;
        if ($timeDiff < 900) {
            # code...
            return true;
        } else {
            return false;
        }
    }
}