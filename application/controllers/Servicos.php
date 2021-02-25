<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Servicos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Servicos Cadastrados',
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
            'servicos' => $this->core_model->get_all('servicos'),
        );


        $this->load->view('layout/reader', $data);
        $this->load->view('servicos/index');
        $this->load->view('layout/footer');
    }

    public function edit($servico_id = NULL) {
        if (!$servico_id || !$this->core_model->get_by_id('servicos', array('servico_id' => $servico_id))) {
            $this->session->set_flashdata('error', 'Serviço não localizado');
            redirect('servicos');
        } else {


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

                $this->core_model->update('servicos', $data, array('servico_id' => $servico_id));

                redirect('servicos');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizando Serviços',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'servicos' => $this->core_model->get_by_id('servicos', array('servico_id' => $servico_id)),
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('servicos/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($servico_id = NULL) {
        if (!$servico_id || !$this->core_model->get_by_id('servicos', array('servico_id' => $servico_id))) {
            $this->session->set_flashdata('error', 'Servico não localizado');
            redirect('servicos');
        } else {

            $this->core_model->delete('servicos', array('servico_id' => $servico_id));
            redirect('servicos');
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

            $this->core_model->insert('servicos', $data);

            redirect('servicos');
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
            $this->load->view('servicos/add');
            $this->load->view('layout/footer');
        }
    }

}
