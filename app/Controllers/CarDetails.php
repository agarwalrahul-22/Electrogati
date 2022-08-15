<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\SalesModel;
use App\Models\RentModel;
use App\Models\ProfileModel;

class CarDetails extends Controller{
    public $salesModel;
    public $rentModel;
    public $userModel;

    public function __construct()
    {
        $this->salesModel = new SalesModel();
        $this->rentModel = new RentModel();
        $this->userModel = new ProfileModel();
    }

    // handle direct url case later
    public function index($table="",$id=-1){

        if(!session()->has('logged_user')){
            return redirect()->to(base_url()."/login");
        }

        $data = [
            'page_title'=>'Electrogati » Car Details',
            'page'=>'cardetails', 
            'images'=>[],
        ];
        if($table && $id){
            if(strcmp($table,'sales')==0 && $id>0){
                $data['details'] = $this->salesModel->find($id);
                $data['userdata'] = $this->userModel->getLoggedInUserData($data['details']['user_id']);
                $data['details']['price']= 'Rs. '. $data['details']['price'] . ' Lakh';
            }
            else if(strcmp($table,'rent')==0 && $id>0){
                $data['details'] = $this->rentModel->find($id);
                $data['userdata'] = $this->userModel->getLoggedInUserData($data['details']['user_id']);
                $data['details']['km_ch'] = 'Rs. ' .$data['details']['km_ch'] . ' /day';
                $data['details']['driver_ch'] = 'Rs. ' .$data['details']['driver_ch'] . ' /day';
                $data['details']['vehicle_ch'] = 'Rs. ' .$data['details']['vehicle_ch'] . ' /day';
                $data['details']['maintainance_ch'] = 'Rs. ' .$data['details']['maintainance_ch'] . ' /day';
                unset($data['details']['price']);

            }
            unset($data['details']['_id']);
            unset($data['details']['user_id']);

            if($data['details']['image1'])
            array_push($data['images'],$data['details']['image1']);

            if($data['details']['image2'])
            array_push($data['images'],$data['details']['image2']);

            if($data['details']['image2'])
            array_push($data['images'],$data['details']['image3']);

            unset($data['details']['image1']);
            unset($data['details']['image2']);
            unset($data['details']['image3']);

            $data['details']['listed on'] = $data['details']['created_at'];
            unset($data['details']['created_at']);

            return view('cardetails_view',$data);

        }
        else{
            echo "<h1 style='color: red;'>Table name required and record id must be greter than 0 </h1>";
        }
    }



}