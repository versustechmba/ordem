<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Ordem_servicos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
        
        $this->load->model('ordem_servicos_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Ordem Servicos Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
                'vendor/datatables/dataTables.bootstrap4.css'
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
                'js/demo/datatables-demo.js',
                'js/endereco.js'
            ),
            'ordem_servicos' => $this->Ordem_servicos_model->get_all('ordem_servicos')
        );

        $this->load->view('layout/reader', $data);
        $this->load->view('ordem_servicos/index');
        $this->load->view('layout/footer');
    }

    public function edit($ordem_servico_id = NULL) {
        if (!$ordem_servico_id || !$this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id))) {
            $this->session->set_flashdata('error', 'Ordem Serviço não localizado');
            redirect('os');
        } else {    

               $this->form_validation->set_rules('ordem_servico_cliente_id','','required');
               $this->form_validation->set_rules('ordem_servico_forma_pagamento_id','','required');
               $this->form_validation->set_rules('ordem_servico_equipamento','','trim|max_length[80]|required');
               $this->form_validation->set_rules('ordem_servico_marca_equipamento','','trim|max_length[80]|required');
               $this->form_validation->set_rules('ordem_servico_modelo_equipamento','','trim|max_length[80]|required');
               $this->form_validation->set_rules('ordem_servico_acessorios','','trim|max_length[300]|required');
               $this->form_validation->set_rules('ordem_servico_defeito','','trim|max_length[300]|required');
               
            
               if($this->form_validation->run()){
                   
                   exit('validado');
                   
               } else {
                   
                   // Abre Tela inicial para Preenchimento
                    $data = array(
                          'titulo' => 'Atualizando Ordem de Serviços',
                          'styles' => array(
                          'vendor/select2/select2.min.css',
                          'vendor/autocomplete/jquery-ui.css',
                          'vendor/autocomplete/estilo.css'
                    ),
                    'scripts' => array(
                          'vendor/autocomplete/jquery-migrate.js',
                          'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                          'vendor/calcx/os.js',
                          'vendor/select2/select2.min.js',
                          'vendor/sweetalert2/sweetalert2.js',
                          'vendor/autocomplete/jquery-ui.js',
                    ),
                    'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo'=>1)),
                    'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos',array('forma_pagamento_ativa'=>1)),
                    'os_tem_servicos' => $this->ordem_servicos_model->get_all_servicos_by_ordem($ordem_servico_id),
                    'ordem_servico' => $this->ordem_servicos_model->get_by_id(array('ordem_servico_id' => $ordem_servico_id))
                    ); 
                    
                    
                    $this->load->view('layout/reader', $data);
                    $this->load->view('ordem_servicos/edit');
                    $this->load->view('layout/footer');
                   
               }
            
            }
        
    }

    public function del($servico_id = NULL) {
        if (!$servico_id || !$this->core_model->get_by_id('ordem_servicos', array('servico_id' => $servico_id))) {
            $this->session->set_flashdata('error', 'Servico não localizado');
            redirect('ordem_servicos');
        } else {

            $this->core_model->delete('ordem_servicos', array('servico_id' => $servico_id));
            redirect('ordem_servicos');
        }
    }

    public function add() {


        $this->form_validation->set_rules('servico_nome', '', 'trim|required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('servico_preco', '', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('servico_descricao', '', 'trim|required|min_length[10]|max_length[700]');

        if ($this->form_validation->run()) {

            $data = elements(
                    array(
                        'servico_nome',
                        'servico_preco',
                        'servico_descricao',
                        'servico_ativo',
                    ), $this->input->post()
            );


            $data = html_escape($data);

            $this->core_model->insert('ordem_servicos', $data);

            redirect('ordem_servicos');
        } else {


            // Erro de Validação               

            $data = array(
                'titulo' => 'Cadastrar Servicos',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js'
                )
            );

            $this->load->view('layout/reader', $data);
            $this->load->view('ordem_servicos/add');
            $this->load->view('layout/footer');
        }
    }

}

