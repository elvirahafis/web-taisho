<?php

class Product_model extends CI_Model
{
    public function createProduct($table, $data)
    {
        $in = $this->db->insert($table, $data);
        return $in;
    }

    public function updateProduct($table, $data)
    {
        $in = $this->db->update($table, $data);
        return $in;
    }
}