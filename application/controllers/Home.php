<?php

   defined('BASEPATH') OR exit('Ação não Permitida');
   
   class Home extends CI_Controller {
       
       public function __construct(){
           parent::__construct();
           
           if (!$this->ion_auth->logged_in())
		{
                        $this->session->set_flashdata('info','Sua Sessão Expirou... Reconecte Novamente!');
			redirect('login');
		}
        
           
       }
       
       public function index(){
           
           
           
           $this->load->view('layout/reader');
           $this->load->view('home/index');
           $this->load->view('layout/footer');
       }
   }
