<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            "page_title" => "Mobility » Admin",
            "page" => "admin"
        ];
        return view('admin_view',$data);
    }
}