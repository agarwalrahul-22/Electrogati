<?php
namespace App\Controllers;

class Buy extends BaseController
{
    public function index()
    {
        $data = [
            "page_title" => "Mobility » Buy",
            "page" => "buy"
        ];
        return view('buy_view',$data);
    }
}