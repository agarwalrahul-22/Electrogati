<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\RentModel;
use App\Models\VehicleModel;
use App\Models\CityModel;

class Rent extends Controller
{
    public $rentModel;
    public $session;
    public $cityModel;

    public function __construct()
    {
        helper('form');
        $this->rentModel = new RentModel();
        $this->vehicleModel = new VehicleModel();
        $this->cityModel= new CityModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $errors['brands'] = $this->vehicleModel->findColumn('brand');
        $errors['brands']= array_unique($errors['brands']);
        sort($errors['brands']);
        $errors['states']= $this->cityModel->findColumn('state');
        $errors['states']= array_unique($errors['states']);
        sort($errors['states']);


        if(!session()->has('logged_user')){
            return redirect()->to(base_url()."/login");
        }
        $errors['errors'] = null;    $errors['page_title']= 'Rent';
        $errors['uploaderror']=null; $errors['imageerror']=null;
        $errors['user_id']=null;     $errors['brand'] = $errors['brands'][0]; $errors['state']= $errors['states'][0];
        $errors['variant']=null;     $errors['model'] = null; $errors['city']=null;
        $errors['chesis']=null;      $errors['km_ch'] = 0;
        $errors['driver']=null;
        $errors['purchase']=null;    $errors['imageerror'] = null;
        $errors['vehicle_ch']=0;  $errors['maintainance_ch']=0;
        $errors['driver_ch']=0;
        $errors['page']='rent1';     $errors['price']=null;
        $errors['models']=$this->vehicleModel->where('brand',$errors['brands'][0])->findColumn('model');
        $errors['cities']=$this->cityModel->where('state',$errors['states'][0])->findColumn('city');

        if($this->request->getMethod() == 'post'){

            $rules=[
                'images'=>[
                    'rules'=>'uploaded[images.0]|max_size[images,2048]',
                    'errors'=>[
                        'ext_in'=> 'invalid file extension',
                        'uploaded'=> 'image not uploaded',
                        'max_size'=> 'image must be less than 2MB',
                    ]
                    ],
                ];
            $uniid = session()->get('logged_user');
            $data = [
                'user_id'=> $uniid,
                'brand' => $this->request->getVar('brand'),
                'variant' => $this->request->getVar('variant'),
                'model' => $this->request->getVar('model'),
                'chesis' => $this->request->getVar('chesis'),
                'driver' => $this->request->getVar('driver'),

                'purchase' => $this->request->getVar('purchase'),
                'km_ch' => $this->request->getVar('km_ch'),
                'driver_ch' => $this->request->getVar('driver_ch'),
                'vehicle_ch' => $this->request->getVar('vehicle_ch'),
                'maintainance_ch' => $this->request->getVar('maintainance_ch'),
                'state'=> $this->request->getVar('state'),
                'city'=> $this->request->getVar('city'),
            ];


            $data['price']= $data['km_ch']+ $data['vehicle_ch'] + $data['maintainance_ch'];
            $errors['models']= $this->vehicleModel->where('brand',$data['brand'])->findColumn('model');
            $errors['cities']= $this->cityModel->where('state',$data['state'])->findColumn('city');
            if($this->validate($rules)){
                $files = $this->request->getFiles();
                $i = 1;
                foreach($files['images'] as $img){
                    if($i == 4) break;
                    if($img->isValid() && !$img->hasMoved()){
                        $newname = $img->getRandomName();
                        if($img->move(FCPATH.'public\uploads',$newname)){
                            $data['image'.$i] = $newname;
                            $i = $i +1;
                        }
                        else{
                            array_push($errors,'uploaderror','unable to save image');
                        }
                    }

                }
            }
            else{
                $errors['imageerror'] = $this->validator;
            }
    // save to database
             if(!$errors['imageerror']){
                  if($this->rentModel->save($data)){
                   return redirect()->to(base_url());
                   }
              else{

                     $errors['errors']= $this->rentModel->errors();

               }
            }

    $errors = array_merge($errors,$data);

        }

        return view('rent_view',$errors);
    }

 }