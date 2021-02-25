<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Categorias Cadastradas',
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
            'categorias' => $this->core_model->get_all('categorias'),
        );


        $this->load->view('layout/reader', $data);
        $this->load->view('categoria/index');
        $this->load->view('layout/footer');
    }

    public function edit($categoria_id = NULL) {
        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
            $this->session->set_flashdata('error', 'Categoria não localizado');
            redirect('categoria');
        } else {


            $this->form_validation->set_rules('categoria_nome', '', 'trim|required|min_length[10]|max_length[45]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'categoria_nome',
                            'categoria_ativa'
                        ), $this->input->post()
                );

                $data = html_escape($data);

                $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));

                redirect('categoria');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizando Marcas',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'categorias' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)),
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('categoria/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($categoria_id = NULL) {
        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
            $this->session->set_flashdata('error', 'Categoria não localizado');
            redirect('categoria');
        } else {

            $this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
            redirect('categoria');
        }
    }

    public function add() {


        $this->form_validation->set_rules('categoria_nome', '', 'trim|required|min_length[10]|max_length[45]');

        if ($this->form_validation->run()) {

            $data = elements(
                    array(
                        'categoria_nome',
                        'categoria_ativa'
                    ), $this->input->post()
            );


            $data = html_escape($data);

            $this->core_model->insert('categorias', $data);

            redirect('categoria');
        } else {


            // Erro de Validação               

            $data = array(
                'titulo' => 'Cadastrar Marcas',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js'
                )
            );



            $this->load->view('layout/reader', $data);
            $this->load->view('categoria/add');
            $this->load->view('layout/footer');
        }
    }

}
