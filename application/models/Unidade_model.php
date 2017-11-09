<?php
class Unidade_model extends CI_Model 
{
    
    private $tabela = 'unidade';

    public function __construct()
    {
        $this->load->database();
    }

    public function salvar(array $data, $id = null) 
    {
        if (empty($id)) {
            return $this->db->insert($this->tabela, $data);
        }
        $this->db->where('id', $id);
        return $this->db->update($this->tabela, $data);
        
    }

    public function excluir($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->tabela);
    }
}