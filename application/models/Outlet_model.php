<?php

class Outlet_model extends CI_Model
{
    public function createOutlet($table, $data)
    {
        $in = $this->db->insert($table, $data);
        return $in;
    }

    public function updateOutlet($table, $data)
    {
        $in = $this->db->update($table, $data);
        return $in;
    }
}