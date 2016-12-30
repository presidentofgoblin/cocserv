<?php

class ListServer extends CI_Model
{
    private $info;

    public function getInfo($id)
    {
        $sql = "SELECT * FROM servers ORDER BY votes DESC";
        $this->info = $this->db->query($sql);
    }

    public function info()
    {
        return $this->info;
    }
}