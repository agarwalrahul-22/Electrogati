<?php

namespace App\Models;

use \CodeIgniter\Model;


class SalesModel extends Model{

    protected $table = 'sales';
    protected $primaryKey = '_id';
    protected $allowedFields = ['user_id','brand','variant','model','chesis','rc','negotiate','vehicle','purchase','image1','image2','image3','created_at','price','state','city'];

    protected $returnType = 'array';

    protected $validationRules = [
        'brand'=>'required',
        'variant'=>'required',
        'model'=>'required',
        'chesis'=>'required|alpha_numeric',
        'rc'=>'required|alpha_numeric',
        'negotiate'=>'required',
        'vehicle'=>'required|alpha_numeric',
        'purchase'=>'required',
        'price'=>'required|numeric'
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
        'rc' => [
            'required' => 'rc is required',
            'alpha_numeric' => 'rc can only contain alphabets and number. no spaces in between',
        ],
        'vehicle' => [
            'required' => 'vehicle is required',
            'alpha_numeric' => 'vehicle can only contain alphabets and number. no spaces in between',
        ],
        'model' => [
            'required' => 'model is required',
        ],
        'negotiate'=>[
            'required'=>'do you want to negotiate',
        ],
        'purchase'=>[
            'required'=>'purchase date required',
        ],
        'price'=>[
            'required'=>'price is not provided',
            'numeric'=>'price should be a number',
        ]

    ];


}