<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use \CodeIgniter\Model;

class registerModel extends Model
{

    public function creatUser($userdata)
    {
        $builder = $this->db->table('user');
        $res = $builder->insert($userdata);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function creatAdminUser($userdata)
    {
        $builder = $this->db->table('adminuser');
        $res = $builder->insert($userdata);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyUniid($uniid)
    {
        $builder = $this->db->table('user');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid',$uniid);
        $result = $builder->get();

        if(count($result->getResultArray())==1){
            $row = $result->getRow();
            return $row;
        }else{
            return false;
        }

    }
    public function verifyAdminUniid($uniid)
    {
        $builder = $this->db->table('adminuser');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid',$uniid);
        $result = $builder->get();

        if(count($result->getResultArray())==1){
            $row = $result->getRow();
            return $row;
        }else{
            return false;
        }

    }
    public function updateStatus($uniid){
        $builder = $this->db->table('user');
        $builder ->where('uniid',$uniid);
        $builder ->update(['status'=>'active']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
    public function updateAdminStatus($uniid){
        $builder = $this->db->table('adminuser');
        $builder ->where('uniid',$uniid);
        $builder ->update(['status'=>'active']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }
    public function verifyExpiryTime($regTime){
        // $currTime= now();
        // $regTime = strtotime($regTime);
        // $diffTime = (int)$currTime - (int)$regTime;
        // if(360000>$diffTime){
             return true;
        // }else{
        //     return false;
        //}

    }
}