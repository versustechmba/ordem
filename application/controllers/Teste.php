<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Teste extends CI_Controller {
    

    public function index(){
        
        
           echo 'Teste';           
           $dados = array(
             'usuarios'=> $this->ion_auth->users()->result(),  
           );
     
        $this->load->view('layout/header', $dados);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
        
    }
    
    
}