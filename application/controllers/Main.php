<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
        /*$this->load->view('templates/header');
        $this->load->view('home');
        $this->load->view('templates/footer');*/
        $this->load->model('ListServer', 'list');
        $this->list->list();
	}

    public function list()
    {
        $this->load->model('ListServer', 'list');
        $this->list->list();
	}

    public function server($id)
    {

	}

    public function vote($id)
    {

	}

    public function install()
    {
        $this->load->model('Database');
        $this->Database->run();
	}
}
