<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        $data = [
            "page_title" => "Mobility » Test page",
            "key1" => "this is value",
            "page" => "test"
        ];
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        // return view('test',$data);
    }
}