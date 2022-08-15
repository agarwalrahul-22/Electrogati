<?php
namespace App\Controllers;
use \CodeIgniter\Controller;
use \App\Models\RegisterModel;

class Register extends BaseController
{

    public $registerModel;
    public $session;
    public $email;

    public function __construct()
    {
        helper("form");
        helper("date");
        $this->registerModel = new RegisterModel();
        $this->session = \Config\Services::session();
        $this->email = \config\Services::email();
    }


    public function index()
    {
        //$session = \CodeIgniter\Config\Services::session();
        $data = [];
        $data['validation'] = null;
        $data["page_title"] = "Electrogati »  Sign up for a new account ";
        $data["page"] = "register";

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[4]|max_length[32]|is_unique[user.username]',
                'email' => 'required|valid_email|is_unique[user.email]',
                'pass' => 'required|min_length[6]|max_length[16]',
                'cpass' => 'required|matches[pass]',
                'mobile' => 'required|exact_length[10]|numeric'
            ];
            if ($this->validate($rules)) {

                $uniid = md5(str_shuffle('ELECTROGATI' . time()));
                $userdata = [
                    'username' => $this->request->getVar('username', FILTER_UNSAFE_RAW),
                    'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
                    'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                    'mobile' => $this->request->getVar('mobile'),
                    'uniid' => $uniid,
                    'activation_date' => date("Y-m-d h:i:s"),
                ];
                if ($this->registerModel->creatUser($userdata)) {
                    $to = $this->request->getVar('email');
                    $subject = 'Electrogati » Account Activation Link ';
                    //   $message = "Hi $#32{$userdata['username']}&#44; <br><br> Thanks Your Account Created Successfully &#46; Please Click below link to activate your account <br><br><a href='www.electrogati.com/register/activate/{$uniid}' target='_blank'>Activate Now</a><br><br>  If You are not able to access link then copy pest following link into your browser <br>https://www.electrogati.com/register/activate/{$uniid} <br> <br> Thank you<br>Team Elecreogati.";
                    //   $message = 'Hi'.$userdata['username'].', '.<br><br>.' Thanks Your Account Created Successfully'.<br><br>.' Please Click below link to activate your account '.<br><br> <a href=.'www.electrogati.com/register/activate/'.'{$uniid}.' target='blank'>'.'Activate Now'.</a><br><br>'.' Thanks ,Team Elecreogati.';
                    $urlss = base_url();
                    $message = '<html>';
                    $message .= '<body> ';
                    $message .= '<h1 style="color:#080;font-size:18px;">Hi ' . $userdata['username'] . '</h1>';
                    $message .= '<p style="color:#080;font-size:18px;"> Thanks Your Account Created Successfully, Please Click below link to activate your account </p>';
                    $message .= '<a href="'.$urlss.'/register/activate/' . $uniid . '" target="blank"> Activate Now </a>';
                    $message .= '<p style="color:#080;font-size:18px;"> Note : If you are not able to access this link Kindly copy paste following link to your web browser. </p>';
                    $message .= 'https://'.$urlss.'/register/activate/'.$uniid.'';
                    $message .= '<br> <br> If you dont request for this registration , Please dont click on above Link and contact us At electrogati2020@gmail.com <br> Do Not Replay to this email';
                    $message .= '</body></html>';

                    $this->email->setTo($to);
                    $this->email->setFrom('strgrpiitbbs@gmail.com');
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);

                    if ($this->email->send()) {
                        $this->session->setTempdata('success', 'Account Created Successfullly. Please check your email for Activation link');
                        // $this->session->set('logged_user', $userdata['uniid']);
                        return redirect()->to(current_url());
                    } else {
                        $data = $this->email->printDebugger(['headers']);
                        print_r($data);
                        // echo "False";
                        exit();
                        $this->session->setTempdata('success', 'Account Created Successfullly. Sorry! Unable to sent activation Link, Contact
                        Admin for assistance', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setTempdata('error', 'Sorry! Unable to creat an account,Try Again', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view("register_view", $data);
    }

    public function activate($uniid = null)
    {

    $data = [];
    $data["page_title"] = "Electrogati » Account Activation";
    $data["page"] = "activate";

    if (!empty($uniid)) {
        $userdata = $this->registerModel->verifyUniid($uniid);
        if ($userdata) {
            if ($this->registerModel->verifyExpiryTime($userdata->activation_date)) {
                if ($userdata->status == 'inactive') {
                $status = $this->registerModel->updateStatus($uniid);

                if ($status == true) {
                $data['success'] = 'Your account is activated';
                }
                } else {
                $data['success'] = 'Your account is already activated';
                }
            } else {
            $data['error'] = 'Sorry ! Link Expired';
            }
        } else {
            $data['error'] = 'Sorry! Unable to find your Account!';
        }
    } else {
    $data['error'] = 'Sorry Unable to Process your request';
    }

    return view("activate_view", $data);
    }
    }