<?php
namespace App\Controllers;


use \CodeIgniter\Controller;
use App\Models\SalesModel;



class Salelisted extends Controller{
    public $salesModel;


    public function __construct(){
        $this->salesModel = new SalesModel();
    }

    public function index(){
        $data['sales']= NULL;
        $data = [
            "page_title" => "Mobility » Vehicles on Sale",
            "page" => "sale",
        ];

        $data['sales'] = $this->salesModel->findAll(6,0);
        return view('salelist_view',$data);
    }


    public function getPageData(){

        $page = $this->request->getVar('page');
        $sortby = $this->request->getVar('sortby');

        if($page<1){
            $page= 1;
        }
        // sort by ???
        if($sortby){
            $sales= $this->salesModel->orderBy($sortby, 'desc')->findAll(6,6*($page-1));
        }
        else{
            $sales= $this->salesModel->findAll(6,6*($page-1));
        }


        $view = '';

         if ($sales) :
            foreach ($sales as $sale) :

        $view = $view.   '
            <div class="container">
                <div class="card card-body">
                    <Table>
                        <tr>
                            <td rowspan="5"><img height="250px" width="250px"
                                    src=" ' . base_url("public/uploads") . "/" . $sale["image1"] . ' " alt="..."
                                    class="img-thumbnail"></td>

                            <head colspan="2">
                                <p style="font-size:16px; font-weight:900;">'. $sale["brand"] .' : '. $sale["model"]. ' </p>
                            </head>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Listed on:  <strong> '. $sale["created_at"] .'</strong> </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Fuel type:  '. $sale["variant"] . '</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Price :  ₹  '. $sale["price"] . ' Lakh</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a class="scrollto"
                                    style="text-decoration:none; background-color:#f82249; padding: 6px; border-radius:10px;"
                                    href='.base_url() . '/cardetails/index/sales/' . $sale['_id'] .'>Details</a>

                            </td>

                        </tr>
                    </Table>
                </div>
            </div>
            <br>';
            endforeach;
            endif;

            $data['view']= $view;

            return $this->response->setJSON($data);

    }


}