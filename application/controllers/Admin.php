<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth/Login');
    }

    public function addserver()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function adduser()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function addnotice()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function viewservers()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {
            $this->load->model('admin/view/Server', 'server');
            $this->server->data();
        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function viewusers()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {
            $this->load->model('admin/view/Users', 'user');
            $this->user->get();
        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function viewnotices()
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function edituser($id)
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function editserver($id)
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }

    public function editnotice($id)
    {
        if($this->Login->loggedin() && $this->session->acctype == 4)
        {

        } else {
            show_error("You are not allowed to access this page", 403, "Insufficient credentials");
        }
    }
}