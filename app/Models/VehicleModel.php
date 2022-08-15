<?php

namespace App\Models;

use \CodeIgniter\Model;


class VehicleModel extends Model{

    protected $table = 'vehicle';
    protected $primaryKey = '_id';
    protected $allowedFields = ['brand','model','variant','gear','created_at'];

    protected $returnType = 'array';


}