<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Marcas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Marcas Cadastradas',
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
            'marcas' => $this->core_model->get_all('marcas'),
        );


        $this->load->view('layout/reader', $data);
        $this->load->view('marcas/index');
        $this->load->view('layout/footer');
    }

    public function edit($marca_id = NULL) {
        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {
            $this->session->set_flashdata('error', 'Serviço não localizado');
            redirect('marcas');
        } else {


            $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[10]|max_length[45]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'marca_nome',
                            'marca_ativa'
                        ), $this->input->post()
                );

                $data = html_escape($data);

                $this->core_model->update('marcas', $data, array('marca_id' => $marca_id));

                redirect('marcas');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizando Marcas',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'marcas' => $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id)),
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('marcas/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($marca_id = NULL) {
        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {
            $this->session->set_flashdata('error', 'Marca não localizado');
            redirect('marcas');
        } else {

            $this->core_model->delete('marcas', array('marca_id' => $marca_id));
            redirect('marcas');
        }
    }

    public function add() {


        $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[10]|max_length[45]');

        if ($this->form_validation->run()) {

            $data = elements(
                    array(
                        'marca_nome',
                        'marca_ativa'
                    ), $this->input->post()
            );


            $data = html_escape($data);

            $this->core_model->insert('marcas', $data);

            redirect('marcas');
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
            $this->load->view('marcas/add');
            $this->load->view('layout/footer');
        }
    }

}
