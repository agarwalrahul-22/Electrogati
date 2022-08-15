<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProfileModel;

class Profile extends Controller
{

    public $pModel;
    public $session;

    public function __construct()
    {
        helper('form');
        helper("date");
        $this->pModel = new ProfileModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {

        if(!session()->has('logged_user')){
            return redirect()->to(base_url()."/login");
        }
        $data = [
            "page_title" => "Electrogati » Cart",
            "page" => "profile"
        ];
        $data['validation'] = null;
        $uniid = session()->get('logged_user');

        $userdata = $this->pModel->getLoggedInUserData($uniid);

       $data['userdata'] =  $userdata;
        if ($this->request->getMethod() == 'post') {
            $rules=[
                'address' => 'required|min_length[4]|max_length[100]',
                'state' => 'required',
                'district' => 'required',
                'pincode' => 'required|exact_length[6]|numeric',
                ];
            if ($this->validate($rules)) {
                $profdata = [
                    'address' => $this->request->getVar('address'),
                    'state' => $this->request->getVar('state'),
                    'district' => $this->request->getVar('district'),
                    'pincode' => $this->request->getVar('pincode'),
                    'uniid' => $userdata->uniid,
                ];
                // $file = $this->request->getFile('pimage');
                // print_r($file);
                // if(!$file->hasMoved()){
                //         $newname = $file->getRandomName();
                //         if($file->move(FCPATH.'public\uploads',$newname)){
                //             $profdata['pimage'] = $newname;
                //         }
                // }
                if($this->pModel->updateUser($profdata)){
                    return redirect()->to(base_url() . '/Dashboard');
                }else{
                    echo "errroooorrr";
                    return redirect()->to(current_url());
                }
            }else {
                $data['validation'] = $this->validator;
            }
        }
            return view('profile_view',$data);
}




    public function logout(){
        if (session()->has('logged_info')) {
            $la_id = session()->get('logged_info');
            $this->pModel->updateLogoutTime($la_id);
        }
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url()."/login");

    }

    public function login_Activity()
    {

        $data = [
            "page_title" => "Electrogati » Session  ",
        ];
        $data [ 'userdata' ] = $this->pModel->getLoggedInUserData(session()->get('logged_user'));
        $data['login_info'] = $this->pModel->getLoginUserInfo(session()->get('logged_user'));

        return view('login_act',$data);
    }




}
?>