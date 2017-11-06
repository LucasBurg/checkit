<?php
class Pessoa_model extends CI_Model 
{
    
    private $tabela = 'pessoa';
    
    
    
    public function __construct()
    {
        $this->load->database();
    }


    public function salvar($id = null) 
    {
        if (empty($id)) {
            return $this->db->insert($this->tabela, array());
        }


        $this->db->where('id', $id);
        return $this->db->update($this->tabela, array());
        
    }

}