<?php

/**
 * Created by PhpStorm.
 * User: karan
 * Date: 09/01/2017
 * Time: 21:10
 */
class Add_server extends CI_Model
{
    public function add()
    {
        $this->load->view('templates/header');
        $this->load->view('server/add');
        $this->load->view('templates/footer');
    }

    public function process()
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

        if($this->form_validation->run() == FALSE){
            redirect(base_url('server/add'));
        } else {

            $data = [
                'description'  => $this->input->post('desc'),
                'game'  => $this->input->post('game'),
                'name'  => $this->input->post('name'),
                'port'  => $this->input->post('port'),
                'ip'    => $this->input->post('ip'),
                'votes' => 0,
                'owner' => $this->session->userid,
            ];

            /*if($this->db->insert('servers', $data)){
                $this->session->set_flashdata('msg', '
                <div class="card teal white-text">
                    <div class="card-content">
                        <span class="card-title">
                            Server Added
                        </span>
                        <p>The server you wanted has been added! Cummon, share it to the world!</p>
                    </div>
                </div>');
                redirect(base_url('server/add'));
            } else {
                $this->session->set_flashdata('msg', '
                <div class="card red white-text">
                    <div class="card-content">
                        <span class="card-title">
                            Server not added!
                        </span>
                        <p>There was a problem adding your server. Please try again later.</p>
                    </div>
                </div>');
                redirect(base_url('server/add'));
            }*/
            $this->db->insert('servers', $data);
        }
    }
}
