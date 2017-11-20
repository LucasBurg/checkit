<?php
class Auditoria extends CI_Controller
{
   public function __construct()
   {
       parent::__construct();
   }

   public function index()
   {
       $this->load->library('template');
       $this->template->show('auditoria','index');
   }

   public function post()
   {

   }

   public function salvar()
   {

   }

   public function excluir()
   {

   }

}
