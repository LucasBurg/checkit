<?php
class Local_model_select extends CI_Model
{
    private $tabela;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tabela = 'local';
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
