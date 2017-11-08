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
        $this->template->add_js(base_url('assets/js/jquery-3.2.1.min.js'));
        $this->template->add_js(base_url('assets/js/bloco/list.js'));
        
        $this->template->show('bloco', 'list');
    }


    public function list_itens()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->model('bloco_select_model', 'bsm');
            $this->load->library('response');

            $blocos = $this->bsm->fetch_all();
            $count_blocos = count($blocos);
            $msg = "Foram encontrados {$count_blocos} blocos";

            if (empty($blocos)) {
                $msg = "Nenhum bloco foi encontrado";
            }

            $this->response->set_data($blocos);
            $this->response->set_valid(true);
            $this->response->set_msg($msg);
        
            return $this->response->get_res_json(); 

        }

        show_404();
    }

    

}