<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ContactModel;
use CodeIgniter\HTTP\RequestInterface;

class Contact extends BaseController
{

    public $contactModel;

    public function __construct()
    {
        helper("form");
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        $data = [];
        $data['validation'] = null;
        $data['page_title'] = "Electrogati » Contact Us";
        $data['page'] = 'contact';
        return view("contact_view", $data);
    }

    public function googleCaptachStore()
    {
        $data = [];
        $data['page_title'] = "Electrogati » Contact Us";
        $data['page'] = 'contact';
        $data['validation'] = null;
        $session = session();
        $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
        $userIp = $_SERVER['REMOTE_ADDR'];
        $secret = '6LfOM0YfAAAAABfWRJG_xKtosTxhMrfpjWJTDrZc';
        $credential = array(
            'secret' => $secret,
            'response' => $this->request->getVar('g-recaptcha-response')
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);

        // print_r($status);
        // exit();
        if ($status['success'] == 1) {
            $rules = [
                'name' => 'required|min_length[3]|max_length[12]',
                // 'lname' => 'required|min_length[3]|max_length[12]',
                'email' => 'required|valid_email',
                'subject' => 'required|min_length[3]|max_length[64]',
                'message' => 'required|min_length[12]|max_length[1042]',
            ];
            if ($this->validate($rules)) {
                $cdata = [
                    'name' =>  $this->request->getVar('name', FILTER_UNSAFE_RAW),
                    // 'lname' =>  $this->request->getVar('lname', FILTER_SANITIZE_STRING),
                    'email' =>  $this->request->getVar('email', FILTER_UNSAFE_RAW),
                    'subject' =>  $this->request->getVar('subject', FILTER_UNSAFE_RAW),
                    'message' =>  $this->request->getVar('message', FILTER_UNSAFE_RAW),
                ];
                $statusx = $this->contactModel->saveData($cdata);
                if ($statusx && $status) {
                    // echo "Succses";
                    $session->setTempdata('success', 'Thanks, We will get back  you soon', 5);
                    return redirect()->to(base_url('contact'));
                } else {
                    $session->setTempdata('error', 'Sorry, Try Again after some time ', 5);
                    return redirect()->to(base_url('contact'));
                }
            } else {
                $data['validation'] = $this->validator;
            }
            return view("contact_view", $data);
        } else {
            $session->setTempdata('error', 'Capcha Verification Failed, Re-verify captcha.', 5);
            return redirect()->to(base_url('contact'));
        }
    }
}