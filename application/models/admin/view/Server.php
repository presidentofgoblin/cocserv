<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Server extends CI_Model
{
    public function get()
    {
        $srv = $this->db->select('*')
            ->from('servers')
            ->get();

        $this->data($srv->result());
    }

    public function data($result)
    {

    }
}