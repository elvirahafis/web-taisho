<?php

class Sales_model extends CI_Model
{
    public function createSales($table, $data)
    {
        $in = $this->db->insert($table, $data);
        return $in;
    }

}