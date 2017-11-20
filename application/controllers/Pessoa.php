<?php
class Pessoa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index($id = null)
    {
        $data = null;
        
        if ($this->input->method() === 'post') {

            $data_bind = array(
                'id'      => $this->input->post('id'),
                'nom'     => $this->input->post('nom'),
                'usu'     => $this->input->post('usu'),
                'sen'     => $this->input->post('sen'),
                'dat_nas' => $this->input->post('dat_nas'),
                'ema'     => $this->input->post('ema'),
                'cpf'     => $this->input->post('cpf'),
            );
            
            $this->load->model('pessoa_model', 'psm');
            $this->psm->set_data($data_bind);
            
            if ($this->psm->validar()) {
                if ($this->psm->salvar()) {
                    redirect(base_url('sucesso?cadastro=true'));
                }
            }
        }

        if (!empty($id)) {
            $this->load->model('pessoa_select','psl');
            $pessoa = $this->psl->filtrar_id($id);
            $data = array('pessoa' => $pessoa);
        }
        
        $this->template->show('pessoa', 'form', $data);

    }

    //retorna uma lista de pessoas
    public function list()
    {
        $pessoas = array();
        $this->load->model('Pessoa_select','psl');
        $pessoas = $this->psl->listar_todos();
        $data = array('pessoas'=>$pessoas);
        $this->template->show('pessoa','lista',$data);
    }

    //cria ou altera a pessoa
    public function post($id = null)
    {

    }

    //retorna a pessoa por id
    public function get_id($id = null)
    {

    }

    //excluir a pessoa
    public function excluir($id)
    {
        if ($this->input->method() === 'post') {
            $this->load->model('pessoa_model', 'psm');
            $data_bind = $this->input->post('id');
            //var_dump($data_bind);


            if ($this->psm->excluir($data_bind)) {
                //redireciona para uma pagina de sucesso
                redirect(base_url('pessoa/list'));
            }
        }

        $this->load->model('Pessoa_select','psl');
        $pessoa = $this->psl->filtrar_id($id);
        $data = array('pessoa'=>$pessoa);
        $this->template->show('pessoa','excluir',$data);



    }
}
