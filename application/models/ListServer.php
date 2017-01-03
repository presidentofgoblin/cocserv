<?php

class ListServer extends CI_Model
{
    private $id;
    private $info;
    private $limit;

    public function getInfo($id)
    {
        $this->id = $id;
        $this->db->select('*');
        $this->db->from('servers');
        $this->info = $this->db->get();

        $this->givehtml();
    }

    public function givehtml()
    {

    }
}