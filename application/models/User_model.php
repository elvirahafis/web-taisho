<?php

class User_model extends CI_Model
{

    function createUser($table, $data)
    {
 
        $in = $this->db->insert($table, $data);
        return $in;
    }

    
}