<?php

defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED');

class Login extends CI_Model
{
    public function getdata()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else
        {
            /*$usr = $this->input->post('username');
            $sql = "SELECT * FROM users WHERE username = '$usr'";
            $query = $this->db->query($sql);*/
            $query = $this->db->get_where('users', [
                                    'username' => $this->input->post('username'),
                                ]);

            if($query->num_rows() == 1){
                foreach($query->result() as $row):
                    if(password_verify($this->input->post('password'), $row->password)){

                        // Password and username correct. Good to go

                        // New security : Rehash the password if required.
                        if(password_needs_rehash($row->password, PASSWORD_BCRYPT)){
                            $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_BCRYPT));
                            $this->db->where('id', $row->id);
                            $this->db->update('users');
                        }

                        $session = [
                            'username' => $this->input->post('username'),
                            'email'    => $row->email,
                            'servers'  => $row->maxservers,
                            'apikey'   => $row->apikey,
                            'userid'   => $row->id,
                            'loggedin' => TRUE,
                            'acctype'  => $row->acctype,
                        ];
                        $this->session->set_userdata($session);
                        redirect(base_url());
                    } else {

                        // Oops, the password is wrong. But username exists

                        $this->session->set_flashdata('msg', '
                        <div class="red card white-text">
                            <div class="card-content">
                                <span class="card-title">
                                    OOPS, WRONG PASSWORD
                                </span>
                                <p>
                                    The password you entered was wrong, please try again.
                                </p>
                            </div>
                        </div>');
                        $this->load->view('templates/header');
                        $this->load->view('auth/login');
                        $this->load->view('templates/footer');
                    }
                endforeach;
            } else {

                // Nope, no username of that type exists

                $this->session->set_flashdata('msg', '
                    <div class="red card white-text">
                        <div class="card-content">
                            <span class="card-title">
                                OOPS, NO USERNAME
                            </span>
                            <p>
                                The username you entered is not available in our database
                            </p>
                        </div>
                    </div>');
                $this->load->view('templates/header');
                $this->load->view('auth/login');
                $this->load->view('templates/footer');
            }
        }
    }

    public function loggedin()
    {
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}