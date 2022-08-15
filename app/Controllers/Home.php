<?php

namespace App\Controllers;

use \App\Models\SearchModel;
use \App\Models\SalesModel;
use \App\Models\RentModel;
use \App\Models\CityModel;

class Home extends BaseController
{
    public $searchModel;
    public $saleModel;
    public $rentModel;
    public $cityModel;

    public function __construct()
    {
        helper("form");
        $this->saleModel=new SalesModel();
        $this->searchModel = new SearchModel();
        $this->rentModel=new RentModel();
        $this->cityModel=new CityModel();
    }

    public function index()
    {
        $data = [
            "page_title" => "Electrogati: Buy, Sell and Rent used cars online",
            "page" => "home"
        ];
        $data['rent']=$this->rentModel->findall();
        $data['sale']=$this->saleModel->findall();
        $data['userdata']=array_unique($this->searchModel->findColumn('brand'));
        $data['stateData']=array_unique($this->cityModel->findColumn('state'));
        return view('home_view.php',$data);
    }

    public function getModels(){
        $brand = $this->request->getVar('brand');
        $data = $this->searchModel->where('brand',$brand)->findColumn('model');
        $data=array_unique($data);
        return $this->response->setJSON($data);
    }
    public function getVariants(){
         $brand=$this->request->getVar('brand');
         $data=$this->searchModel->where('brand',$brand)->findColumn('variant');
         $data=array_unique($data);
         return $this->response->setJSON($data);
    }
    public function getCities(){
        $state=$this->request->getVar('stateName');
        $data=$this->cityModel->where('state',$state)->findColumn('city');
        $data=array_unique($data);
        return $this->response->setJSON($data);


    }
    public function showData(){
            $requesteddata = [
                'brand'=> $this->request->getPost('brand'),
                //  'model'=> $this->request->getPost('model'),
                 'variant'=>$this->request->getPost('variant')
            ];
            $sales=$this->saleModel->where('brand',$requesteddata['brand'])->where('variant',$requesteddata['variant'])->findall();
            $requesteddata['redata']=$sales;
            $requesteddata['page_title']="SaleListed";
            $requesteddata['page']="ssearch";
            $requesteddata['pager']=$this->saleModel->pager;
            return view('search_view.php',$requesteddata);
    }
    public function showRentData(){

        $requesteddata = [
            'brand'=> $this->request->getPost('brand'),
            //  'model'=> $this->request->getPost('model'),
             'variant'=>$this->request->getPost('variant')
        ];
        $rents=$this->rentModel->where('brand',$requesteddata['brand'])->where('variant',$requesteddata['variant'])->findall();
        $requesteddata['redata']=$rents;
        $requesteddata['page_title']="RentListed";
        $requesteddata['pager']=$this->rentModel->pager;
        $requesteddata['page']="rsearch";
        return view('search_view.php',$requesteddata);

    }
    public function showResult(){

        $requesteddata = [
            'state'=> $this->request->getPost('state'),
            'city'=> $this->request->getPost('city'),
            //  'variant'=>$this->request->getPost('variant')
        ];

        $redata=$this->cityModel->where('state',$requesteddata['state'])->where('city',$requesteddata['city'])->findall();
        $requesteddata['redata']=$redata;
        $requesteddata['page_title']="search_city";
        $requesteddata['page']="ssearch";
        return view('search_view.php',$requesteddata);
    }

    public function showBrand(){

        $requesteddata = [
            'brand'=> $this->request->getPost('brand')

        ];
        $redata=$this->saleModel->where('brand',$requesteddata['brand'])->findall();
        $requesteddata['redata']=$redata;
        $requesteddata['page_title']="search_brand";
        $requesteddata['page']="ssearch";
        return view('search_view.php',$requesteddata);
    }

    public function showCitySearch(){

        $requesteddata = [
            'select'=> $this->request->getPost('select'),
            'city'=>$this->request->getPost('city'),
            'state'=>$this->request->getPost('state')

        ];

        if($requesteddata['select']=='rent'){
            $redata=$this->rentModel->where('state',$requesteddata['city'])->where('city',$requesteddata['state'])->findall();
            $requesteddata['redata']=$redata;
            $requesteddata['page_title']="search_brand";
            $requesteddata['page']="ssearch";
            return view('search_view.php',$requesteddata);

         }

         if($requesteddata['select']=='sale'){

            $redata=$this->saleModel->where('state',$requesteddata['state'])->where('city',$requesteddata['city'])->findall();
            $requesteddata['redata']=$redata;
            $requesteddata['page_title']="search_brand";
            $requesteddata['page']="ssearch";
            return view('search_view.php',$requesteddata);

         }
    }
}