<?php
class Bloco_select_model extends CI_Model 
{
    private $tabela;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tabela = 'bloco';
    }

    public function fetch_all()
    {
        return $this->db->get($this->tabela)->result_array();
    }

    public function fetch_one($id) 
    {
        return $this->db->get_where($this->tabela, array('id' => $id))->row_array();
    }

}