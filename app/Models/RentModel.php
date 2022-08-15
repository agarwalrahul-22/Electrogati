<?php

namespace App\Models;

use \CodeIgniter\Model;


class RentModel extends Model{

    protected $table = 'rent';
    protected $primaryKey = '_id';
    protected $allowedFields = ['user_id','brand','variant','model','chesis','driver','vehicle','purchase','image1','image2','image3','km_ch','driver_ch','vehicle_ch','maintainance_ch','created_at','price','state','city'];

    protected $returnType = 'array';

    protected $validationRules = [
        'brand'=>'required',
        'variant'=>'required',
        'model'=>'required',
        'chesis'=>'required|alpha_numeric',
        'driver'=>'required',

        'purchase'=>'required',
        'km_ch'=>'required',
        'driver_ch'=>'required',
        'maintainance_ch'=>'required',
        'vehicle_ch'=>'required',
    ];

    protected $validationMessages = [
        'brand' => [
            'required' => 'brand is required',
            'alpha_numeric' => 'brand can only contain alphabets and number. no spaces in between',
        ],
        'variant' => [
            'required' => 'variant is required',
            'alpha_numeric' => 'variant can only contain alphabets and number. no spaces in between',
        ],
        'chesis' => [
            'required' => 'chesis is required',
            'alpha_numeric' => 'chesis can only contain alphabets and number. no spaces in between',
        ],

        'model' => [
            'required' => 'model is required',
        ],
        'driver'=>[
            'required'=>'do you want to driver',
        ],
        'purchase'=>[
            'required'=>'purchase date required',
        ],
        'km_ch'=>[
            'required'=>'charges/KM required',
        ],
        'maintainance_ch'=>[
            'required'=>'maintainance charges required',
        ],
        'vehicle_ch'=>[
            'required'=>'vehicle charges required',
        ],

    ];


}