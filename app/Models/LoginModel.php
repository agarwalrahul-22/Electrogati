<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use \CodeIgniter\Model;

class LoginModel extends Model
{
    public function verifyEmail($email)
    {

        $builder = $this->db->table('user');
        $builder->select('uniid,status,password,username,email');
        $builder->where('email', $email);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }
    public function verifyAdminEmail($email)
    {

        $builder = $this->db->table('adminuser');
        $builder->select('uniid,status,password,username,email');
        $builder->where('username', $email);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }


    public function saveLoginInfo($data)
    {
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }
    public function saveAdminLoginInfo($data)
    {
        $builder = $this->db->table('admin_login_activity');
        $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function updatedAt($id)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $builder->update(['updated_at' => date('Y-m-d h:i:s')]);

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function adminUpdatedAt($id)
    {
        $builder = $this->db->table('adminuser');
        $builder->where('uniid', $id);
        $builder->update(['updated_at' => date('Y-m-d h:i:s')]);

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyToken($token)
    {
        $builder = $this->db->table('user');
        $builder->select("uniid,username,updated_at");
        $builder->where('uniid', $token);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }

    public function verifyAdminToken($token)
    {
        $builder = $this->db->table('adminuser');
        $builder->select("uniid,username,updated_at");
        $builder->where('uniid', $token);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }

    public function checkExpiryDate($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $timeDiff = $current_time - $update_time;
        if ($timeDiff < 900) {
            # code...
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($id, $pwd)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $builder->update(['password' => $pwd]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function updateAdminPassword($id, $pwd)
    {
        $builder = $this->db->table('adminuser');
        $builder->where('uniid', $id);
        $builder->update(['password' => $pwd]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
