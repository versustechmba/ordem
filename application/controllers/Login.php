<?php

defined('BASEPATH') OR exit('Ação não Permitida!');

class Login extends CI_Controller {
    //put your code here
    
    public function index() {
        
            $this->load->view('layout/reader');
            $this->load->view('login/index');
            $this->load->view('layout/footer');
            
    }
    
    public function auth() {
        
        $identity = $this->security->xss_clean($this->input->post('email'));
	$password = $this->security->xss_clean($this->input->post('password'));
	$remember = FALSE; // remember the user
	
        if($this->ion_auth->login($identity, $password, $remember)){
            
            redirect('home');
            
        } else {
            
            $this->session->set_flashdata('error','Verefique seu Email e Senha');
            redirect('login');            
            
        }
        
        
    }
    
    public function logout(){
        $this->ion_auth->logout();
        redirect('login');
    }
    
    
}
