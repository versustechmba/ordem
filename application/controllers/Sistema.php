<?php

defined('BASEPATH') OR exit ('Ação Não Definida');

class Sistema extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        	if (!$this->ion_auth->logged_in())
		{
                    $this->session->set_flashdata('info','Sua Sessão Expirou... Reconecte Novamente!');
		    redirect('login');
		}
                
        
    }
    
    public function index() {
        
        $data = array(
            'titulo'  => 'Editar informações do Sistema',
            'usuario_logado'=> $this->core_model->get_by_id('users', array('users.id'=>$this->session->userdata('user_id'))),
            'scripts' => array(
                
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ), 
            
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id'=>1)),
            
        );
        
        
        $this->form_validation->set_rules('sistema_razao_social','','required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia','','required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj','','required|exact_length[18]'); // deve conter exatamente 18 caracteres
        $this->form_validation->set_rules('sistema_ie','','required|max_length[25]'); // deve conter exatamente 18 caracteres
        $this->form_validation->set_rules('sistema_email','','required|valid_email|max_length[100]'); // deve conter exatamente 18 caracteres
        $this->form_validation->set_rules('sistema_cep','','required|max_length[9]'); // deve conter exatamente 18 caracteres
        
        if($this->form_validation->run()){
            
            
            $data = elements(
                    
                        array(

                           'sistema_razao_social', 
                           'sistema_nome_fantasia', 
                           'sistema_cnpj', 
                           'sistema_ie', 
                           'sistema_telefone_fixo', 
                           'sistema_telefone_movel', 
                           'sistema_email', 
                           'sistema_site_url', 
                           'sistema_cep', 
                           'sistema_endereco', 
                           'sistema_numero', 
                           'sistema_cidade', 
                           'sistema_estado', 
                           'sistema_txt_ordem_servico' 

                        ), $this->input->post()
                    
                    );
                    
                    $data = html_escape($data);
            
                    $this->core_model->update('sistema',$data, array('sistema_id' => 1));
            
                    redirect('sistema');
                    
            
        } else {
            
            
             $this->load->view('layout/reader', $data);
             $this->load->view('sistema/index');
             $this->load->view('layout/footer');

            
        }
            
        
        
        
    }
    
}

