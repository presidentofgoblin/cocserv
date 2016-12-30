<?php

class ListServer extends CI_Model
{
    private $id;
    private $info;

    public function getInfo($id)
    {
        $this->id = $id;
        $this->db->select('*');
        $this->db->from('servers');
        $this->info = $this->db->get();
    }

    public function info()
    {
        return $this->info;
    }
}