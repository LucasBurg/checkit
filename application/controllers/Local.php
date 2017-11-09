<?php
class Local extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = null)
    {
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nom','Nome','required');

            if ($this->form_validation->run()) {
                $id = $this->input->post('id');

                $data_bind = array(
                    'nome' => $this->input->post('nom')
                );

                $this->load->model('Local_model');
                if($this->Local_model->salvar($data_bind, $id)){
                    redirect('local/list');
                }
            }
        }

        $data = array('local' => null);

        if (is_numeric($id)) {
            $this->load->model('Local_model_select', 'lsm');
            $data['local'] = $this->lsm->fetch_one($id);
        }

        $this->template->show('local','form', $data);

    }

    public function list()
    {
        $this->template->add_js(base_url('assets/js/jquery-3.2.1.min.js'));
        $this->template->add_js(base_url('assets/js/local/list.js'));
        $this->template->show('local', 'list');
    }


    public function list_itens()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->model('local_model_select', 'lsm');
            $this->load->library('response');

            $locais = $this->lsm->fetch_all();
            $count_locais = count($locais);
            $msg = "Foram encontrados {$count_locais} locais";

            if (empty($locais)) {
                $msg = "Nenhum local foi encontrado";
            }

            $this->response->set_data($locais);
            $this->response->set_valid(true);
            $this->response->set_msg($msg);

            return $this->response->get_res_json();

        }

        show_404();
    }

    public function excluir($id = null)
    {
        if ($this->input->method() == 'post') {
            $this->load->model('local_model', 'lm');
            if ($this->lm->excluir($this->input->post('id'))) {
                redirect('/local/list');
            }
        }
        if (is_numeric($id)) {
            $this->load->model('Local_model_select', 'lsm');
            $local = $this->lsm->fetch_one($id);
            $data['id'] = $local['id'];
            $data['descricao'] = $local['id'].' - '.$local['nome'];

        }
        $this->template->show('local', 'exclui',  $data);
    }


}
