<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use \CodeIgniter\Model;

class ContactModel extends Model
{
    public function saveData($data)
    {
        // $db=\Config\Database::connect();
        $builder = $this->db->table('contact');
        $result = $builder->insert($data);
        if($this->db->affectedRows() == 1){
            return true;
        }
        else
            return false;

    }
}