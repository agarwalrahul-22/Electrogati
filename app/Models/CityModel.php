<?php

namespace App\Models;

use \CodeIgniter\Model;


class CityModel extends Model{

    protected $table = 'cities';
    protected $primaryKey = '_id';
    protected $allowedFields = ['_id','city','state'];

    protected $returnType = 'array';


}