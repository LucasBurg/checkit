<?php
class Auditoria extends CI_Controller
{
   function __construct()
   {
     parent::__construct();

   }

   function index()
   {
     $this->load->library('template');
     $this->template->show('auditoria','index');
   }

   function post()
   {

   }

   function salvar()
   {

   }

   function excluir()
   {

   }

}
