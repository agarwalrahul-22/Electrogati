<?php
namespace App\Controllers;


use \CodeIgniter\Controller;
use App\Models\RentModel;


class Rentlisted extends Controller{
    public $rentModel;

    public function __construct(){
        $this->rentModel = new RentModel();
    }

    public function index(){
        $data['rent']= NULL;
        $data = [
            "page_title" => "Mobility » Vehicles on Rent",
            "page" => "rent",
        ];

        $data['rents'] = $this->rentModel->findAll(6,0);
        return view('rentlist_view',$data);
    }


    public function getPageData(){
        $page = $this->request->getVar('page');
        $sortby = $this->request->getVar('sortby');
        if($page<1){
            $page= 1;
        }
        // sort by ???
        if($sortby){
            $rents= $this->rentModel->orderBy($sortby,'desc')->findAll(6,6*($page-1));
        }
        else{
            $rents= $this->rentModel->findAll(6,6*($page-1));
        }
        $view = '';

         if ($rents) :
            foreach ($rents as $rent) :

        $view = $view.   '
            <div class="container">
                <div class="card card-body">
                    <Table>
                        <tr>
                            <td rowspan="5"><img height="250px" width="250px"
                                    src=" ' . base_url("public/uploads") . "/" . $rent["image1"] . ' " alt="..."
                                    class="img-thumbnail"></td>

                            <head colspan="2">
                            <p style="font-size:16px; font-weight:900;">'. $rent["brand"] .' : '. $rent["model"]. ' </p>
                            </head>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Purchased on: <strong> '. $rent["created_at"] .'</strong> </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Fuel type:  '. $rent["variant"] . '</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Price (excl driver charges):  ₹  '. $rent['price'] . ' / day</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a class="scrollto"
                                    style="text-decoration:none; background-color:#f82249; padding: 6px; border-radius:10px;"
                                    href='.base_url() . '/cardetails/index/rent/' . $rent['_id'] .'>Details</a>
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