<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Database\MySQLi\Result;
use \CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getLoggedInSaleData($id)
    {
        $builder = $this->db->table('sales');
        $builder->where('user_id', $id);
        $result = $builder->get();
        $size = count($result->getResultArray());
        if ($size >= 1) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }
    public function getLoggedInRentData($id)
    {
        $builder = $this->db->table('rent');
        $builder->where('user_id', $id);
        $result = $builder->get();
        $size = count($result->getResultArray());
        if ($size >= 1) {
            return $result->getResultArray();
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