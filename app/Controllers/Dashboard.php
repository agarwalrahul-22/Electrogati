<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\DashboardModel;
use App\Models\ProfileModel;

class Dashboard extends Controller
{
    public $dModel;
    public $session;

    public function __construct()
    {
        helper('form');
        helper("date");
        $this->dModel = new DashboardModel();
        $this->pModel = new ProfileModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if(!session()->has('logged_user')){
            return redirect()->to(base_url()."/login");
        }
        $data = [
            "page_title" => "Mobility » Dashboard",
            "page" => "dashboard"
        ];
        $data['userdata'] =  null;
        $data['saledata'] =  null;
        $data['rentdata'] =  null;
        $uniid = session()->get('logged_user');
        $userdata = $this->pModel->getLoggedInUserData($uniid);
        $saledata = $this->dModel->getLoggedInSaleData($uniid);
        $rentdata = $this->dModel->getLoggedInRentData($uniid);
        $data['userdata'] =  $userdata;
        $data['saledata'] =  $saledata;
        $data['rentdata'] =  $rentdata;

        return view('dashboard_view',$data);
    }
}