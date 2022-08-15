<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Database\MySQLi\Result;
use \CodeIgniter\Model;

class ProfileModel extends Model
{
    public function updateUser($profdata)
    {
        $builder = $this->db->table('user');
        $res = $builder->set('delivery_add', $profdata['address'])->where('uniid', $profdata['uniid'])->update();
        $res = $builder->set('permanent_add', $profdata['address'])->where('uniid', $profdata['uniid'])->update();
        $res = $builder->set('delivery_state', $profdata['state'])->where('uniid', $profdata['uniid'])->update();
        $res = $builder->set('delivery_district', $profdata['district'])->where('uniid', $profdata['uniid'])->update();
        $res = $builder->set('pincode_d', $profdata['pincode'])->where('uniid', $profdata['uniid'])->update();
        // $res = $builder->set('profile_pic', $profdata['pimage'])->where('uniid', $profdata['uniid'])->update();
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getLoggedInUserData($id)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function getLoggedInAdminData($id)
    {
        $builder = $this->db->table('adminuser');
        $builder->where('uniid', $id);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function updateLogoutTime($id)
    {
        $builder = $this->db->table('login_activity');
        $builder->where('id', $id);
        $builder->update(['logout_time' => date('Y-m-d h:i:s')]);

        if ($this->db->affectedRows() > 0) {
            return true;
        }
    }
    public function getLoginUserInfo($id)
    {
        $builder = $this->db->table('login_activity');
        $builder->where('uniid', $id);
        $builder->orderBy('id', 'DESC');
        $builder->limit(12);
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResult();
        } else {
            return false;
        }
    }

    public function updateAvatar($path, $id)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $builder->update(['profile_pic' => $path]);

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($npwd, $id)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $builder->update(['password' => $npwd]);

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAdminPassword($npwd, $id)
    {
        $builder = $this->db->table('adminuser');
        $builder->where('uniid', $id);
        $builder->update(['password' => $npwd]);

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function UpdateUserInfo($data, $id)
    {
        $builder = $this->db->table('user');
        $builder->where('uniid', $id);
        $builder->update($data);

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCart($uniid)
    {
        $db = \Config\Database::connect();
        $postQuery = "SELECT * FROM cart WHERE user_uniid = $uniid ";
        $query = $db->query($postQuery);
        $result = $query->getResult();
        return $result;
    }

    public function getorderid($id)
    {

        $builder = $this->db->table('cart');
        $builder->where('user_id', $id);
        $builder->select('order_id');
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResult();
        } else {
            return false;
        }

    }
}