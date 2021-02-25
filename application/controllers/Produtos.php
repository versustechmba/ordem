<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }

        $this->load->model('Produtos_model');
    }

    public function index() {


        $data = array(
            'titulo' => 'produtos Cadastrados',
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
            'tab_produtos' => $this->Produtos_model->get_all(),
            'marcas'=> $this->core_model->get_all('marcas'),
          //  'fabricante'=>$this->core_model->get_all('fabricante'),
            'fornecedores'=> $this->core_model->get_all('fornecedores'),
            
            
        );


        echo '<pre>';
        print_r($data['tab_produtos']);
        exit();

        $this->load->view('layout/reader', $data);
        $this->load->view('produtos/index');
        $this->load->view('layout/footer');
    }

    
    public function edit($produto_id = NULL) {
        if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {
            $this->session->set_flashdata('error', 'Produto não localizado');
            redirect('produtos');
        } else {



            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'produto_codigo',
                            'produto_descricao'
                        ), $this->input->post()
                );

                $data = html_escape($data);

                $this->core_model->update('marcas', $data, array('marca_id' => $marca_id));

                redirect('marcas');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizando Produtos',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'produto'=> $this->core_model->get_by_id('produtos', array('produto_id'=>$produto_id)),
                    'marcas' => $this->core_model->get_all('marcas'),
                    
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('produtos/edit');
                $this->load->view('layout/footer');
            }
        }
    }
}
