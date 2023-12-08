<?php

class Purchase_model extends CI_Model
{
    public function createPurchase($table, $data)
    {
        $in = $this->db->insert($table, $data);
        return $in;
    }

}