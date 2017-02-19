<?php

defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED');

class ListServer extends CI_Model
{
    private function listdata($limit, $start)
    {
        /*$sql = "SELECT * FROM servers ORDER BY votes DESC";
        $this->info = $this->db->query($sql);*/
        $srv = $this->db->select('*')->order_by('votes', 'DESC')->limit($limit, $start)->get('servers');
        return $srv->result_array();
    }

    public function list()
    {
        $this->load->library("pagination");

        $config['base_url'] = base_url('main/list');
        $config['total_rows'] = $this->db->get('servers')->num_rows();
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['num_links'] = round($config['total_rows'] / $config['per_page']);
        $config['full_tag_open'] = '<div class="center-align"><ul class="pagination md-pag">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_tag_open'] = '<li>';
        $config['first_link'] = 'First';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data = [
            'title'         => $this->config->item('site_name'),
            'description'   => $this->config->item('site_description'),
            'keywords'      => $this->config->item('site_keywords'),
            'server'        => $this->listdata($config['per_page'], $page),
            'pagination'    => $this->pagination->create_links(),
        ];

        $this->load->view('templates/header', $data);
        $this->parser->parse('home', $data);
        $this->load->view('templates/footer', $data);
    }
}
