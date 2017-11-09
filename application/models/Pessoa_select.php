<?php
class Pessoa_select extends CI_Model
{
    private $sql;
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function listar_todos()
    {
        $this->sql = "SELECT
        *
        FROM
        pessoa";
        $res = $this->db->query($this->sql);
        return $res->result_array();
    }

    function filtrar_id($id)
    {
        $this->sql = "SELECT
                        *
                    FROM
                        pessoa
                    WHERE
                        id = {$id}";
        $res = $this->db->query($this->sql);
        return $res->row_array();
    }

}
