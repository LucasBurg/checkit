<?php 
class Bloco extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        show_404();
    }

    public function list()
    {
        if ($this->input->is_ajax_request()) {
            //retorna objeto json
        }

        //retorna a view
    }


    public function list_itens()
    {
       
       $this->load->library('response');

       $this->response->set_data(array('nome' => 'Lucas', 'idade' => 23, 'fuma' => false, 'score' => array(1,4,6,8,234)));
        
       return $this->response->get_res_json(); 
    }

    

}