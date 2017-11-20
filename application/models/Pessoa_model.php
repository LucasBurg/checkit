<?php
class Pessoa_model extends CI_Model
{

    private $tabela = 'pessoa';
    
    private $data;
    
    private $id;
    
    public function __construct()
    {
        $this->load->database();
        $this->load->library('form_validation');
    }
    
    public function set_data($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
            unset($data['id']);
        }
        $this->data = $data;
    }
    
    public function validar()
    {
        $this->form_validation->set_data($this->data);
        $this->form_validation->set_rules('nom', 'Nome', 'required|max_length[45]|valid_nome_completo');
        $this->form_validation->set_rules('usu', 'Usuário', 'required|max_length[45]');
        $this->form_validation->set_rules('sen', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('dat_nas', 'Data Nascimento', 'required');
        $this->form_validation->set_rules('ema', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|valid_cpf');
        return $this->form_validation->run();
    }
    
    public function salvar()
    {
        if (empty($this->id)) {
            return $this->db->insert($this->tabela, $this->data);
        }
        $this->db->where('id', $this->id);
        return $this->db->update($this->tabela, $this->data);
    }

    public function excluir($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->tabela);
    }
}
