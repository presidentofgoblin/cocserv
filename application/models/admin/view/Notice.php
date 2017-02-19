<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Notice extends CI_Model
{
    private function data($limit, $start)
    {
        $notice = $this->db->select('*')->limit($limit, $start)->get('notices');

        return $notice->result_array();
    }

    public function get()
    {
        $this->load->library("pagination");

        $config['base_url'] = base_url('admin/viewnotices');
        $config['total_rows'] = $this->db->get('notices')->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = round($config['total_rows'] / $config['per_page']);
        $config['full_tag_open'] = '<div class="pagination no-margin">';
        $config['full_tag_close'] = '</div>';
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
        $config['cur_tag_open'] = '<li class="active"><a href="#"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data = [
            'title'         => $this->config->item('site_name'),
            'description'   => $this->config->item('site_description'),
            'keywords'      => $this->config->item('site_keywords'),
            'server'        => $this->data($config['per_page'], $page),
            'pagination'    => $this->pagination->create_links(),
        ];

        $this->parser->parse('admin/templates/header', $data);
        $this->parser->parse('admin/view/notices', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}