<?php
class Pessoa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        //adicionados no config/autoload
        //$this->load->library('template');
        //$this->load->helper('form');
        //$this->load->helper('url');
        
    }


    //retorna um formulario
    public function index()
    {
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nom', 'Nome', 'required|max_length[45]');

            if ($this->form_validation->run()) {
                //salva os dados
                $this->load->model('pessoa_model', 'psm');
                
                //data bind
                $data_bind = array(
                    'nom' => $this->input->post('nom'),
                    'sen' => $this->input->post('sen'),
                );

                if ($this->psm->salvar($data_bind)) {
                    //redireciona para uma pagina de sucesso
                    redirect(base_url('sucesso?cadastro=true'));
                }
            }
        }
        
        $this->template->show('pessoa', 'form');
    }

    //retorna uma lista de pessoas
    public function list()
    {

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
    public function excluir()
    {

    } 
}