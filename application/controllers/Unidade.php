<?php 
class Unidade extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = null)
    {
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nom', 'Nome', 'required');
            
            if ($this->form_validation->run()) {
                $id = $this->input->post('id');
                $data_bind = array(
                    'nom' => $this->input->post('nom')        
                );
                $this->load->model('unidade_model', 'um');
                if ($this->um->salvar($data_bind, $id)) {
                    redirect('/unidade/list');
                }
            }
        }

        $data = array('unidade' => null);
        
        if (is_numeric($id)) {
            $this->load->model('unidade_select_model', 'usm');
            $data['unidade'] = $this->usm->fetch_one($id);
        }

        $this->template->show('unidade', 'form', $data);    
    }

    public function list()
    {
        //retorna a view
        $this->template->add_js(base_url('assets/js/jquery-3.2.1.min.js'));
        $this->template->add_js(base_url('assets/js/unidade/list.js'));
        $this->template->show('unidade', 'list');
    }


    public function list_itens()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->model('unidade_select_model', 'usm');
            $this->load->library('response');

            $unidades = $this->usm->fetch_all();
            $count_unidades = count($unidades);
            $msg = "Foram encontrados {$count_unidades} unidades";

            if (empty($unidades)) {
                $msg = "Nenhuma unidade foi encontrado";
            }

            $this->response->set_data($unidades);
            $this->response->set_valid(true);
            $this->response->set_msg($msg);
        
            return $this->response->get_res_json(); 

        }

        show_404();
    }

    public function excluir($id = null) 
    {
        if ($this->input->method() == 'post') {
            $this->load->model('unidade_model', 'um');
            if ($this->um->excluir($this->input->post('id'))) {
                redirect('/unidade/list');
            }
        }
        if (is_numeric($id)) {
            $this->load->model('unidade_select_model', 'usm');
            $unidade = $this->usm->fetch_one($id);
            $data['id'] = $unidade['id'];
            $data['descricao'] = $unidade['id'].' - '.$unidade['nom'];
            
        }
        $this->template->show('unidade', 'exclui',  $data);
    }
}