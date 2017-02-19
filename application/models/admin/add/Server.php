<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Server extends CI_Model
{
    private function insert()
    {
        $data = [
            'owner'         => $this->session->userid,
            'ownername'     => $this->session->username,
            'ip'            => $this->input->post('ip'),
            'port'          => $this->input->post('port'),
            'game'          => $this->input->post('game'),
            'name'          => $this->input->post('name'),
            'description'   => $this->input->post('desc'),
            'votes'         => $this->input->post('votes'),
        ];

        return $this->db->insert('servers', $data);
    }

    private function process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Server Name', 'trim|required|min_length[5]|max_length[35]');
        $this->form_validation->set_rules('desc', 'Server Description', 'trim|required|min_length[30]|max_length[500]|alpha_numeric_spaces');
        $this->form_validation->set_rules('game', 'Name of the game', 'trim|required');
        $this->form_validation->set_rules('port', 'Port of the server', 'required|min_length[4]');
        $this->form_validation->set_rules('ip', 'IP Address of the server', 'required|valid_ip|is_unique[servers.ip]',
            array(
                'is_unique[servers.ip]' => 'Server with the same IP address already exists!',
                'valid_ip'              => 'The IP does not seem like an valid IPV4 or IPV6 adress',
                'required'              => 'You are requested to fill the IP field',
            )
        );
        $this->form_validation->set_rules('votes', 'Number of votes to be given', 'required|alpha|max_length[100]');

        if($this->form_validation->run() === FALSE){
            redirect(base_url('admin/addserver'));
        } else
        {
            //todo : Implement the calout for admin
            if($this->insert()){

            } else {

            }
        }
    }
}
