<?php

defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED');

class Register extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function getdata()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[5]|max_length[20]',
            array(
                'required'      => 'You are requested to enter the username',
                'alpha'         => 'Only Alphabets are allowed to be entered in the username',
                'min_length[5]' => 'You are requested to enter username of lenght atleast above 5',
                'max_length[10]' => 'Oops, your username is way too long. Keep it under 20 but higher than 5'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5|matches[password_r]',
            array(
                'required'              => 'You are requested to enter the password',
                'min_length[5]'         => 'The password must contain atleast 5 characters',
                'matches[password_r]'   => 'Oops, the password didn\'t match'
            )
        );
        $this->form_validation->set_rules('password_r', 'Password Repeat', 'trim|required',
            array(
                'required' => 'Please enter the password in repeat password field',
            )
        );
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]',
            array(
                'required'              => 'Please enter the email address',
                'valid_email'           => 'Please enter a valid email address',
                'is_unique[user.email]' => 'The email ID you used is already in use. Try to login.',
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/register');
        } else
        {
            $this->load->helper('string');
            $data = [
                'username'   => $this->input->post('username'),
                'password'   => $this->input->post('password'),
                'email'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'apikey'     => random_string('alnum', 32),
                'maxservers' => '5',
            ];

            if($this->insert($data))
            {
                $this->session->set_flashdata('msg', '
                <div class="card teal white-text">
                    <div class="card-content">
                        <span class="card-title">
                            You are registerd
                        </span>
                        <p>Your account has been created successfully, now you can login without any problem</p>
                    </div>
                </div>');
                redirect(base_url('auth/login'));
            } else {
                $this->session->set_flashdata('msg', '
                <div class="card red lighten-1 white-text">
                    <div class="card-content">
                        <span class="card-title">
                            OOPS! ERROR
                        </span>
                        <p>Something happend on the back end. We will resolve it. Try again after few minutes :)</p>
                    </div>
                </div>
                ');
                redirect(base_url('auth/register'));
            }
        }
    }
}