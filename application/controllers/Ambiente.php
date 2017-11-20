<?php
class Ambiente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('template');
        
    }
    
    public function index()
    {
        $data = array();
        $this->template->add_js(base_url('assets/js/jquery-3.2.1.min.js'));
        $this->template->add_js(base_url('assets/js/comum/bloco_list.js'));
        $this->template->add_js(base_url('assets/js/ambiente/select.js'));
        
        $this->template->show('ambiente', 'form');    
    }
}