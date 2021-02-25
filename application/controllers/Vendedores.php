<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Vendedores extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {



        $data = array(
            'titulo' => 'Vendedores Cadastrados',
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
            'vendedores' => $this->core_model->get_all('vendedores'),
        );

        
//        echo '<pre>';
//        print_r($data['vendedores']);
//        exit();

        $this->load->view('layout/reader', $data);
        $this->load->view('vendedores/index');
        $this->load->view('layout/footer');
    }
    
    public function edit($vendedor_id = NULL) {
        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))) {
            $this->session->set_flashdata('error', 'Cliente não localizado');
            redirect('vendedores');
        } else {

            $this->form_validation->set_rules('vendedor_nome_completo', '', 'required|max_length[145]');
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|exact_length[14]|callback_valida_cpf');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|max_length[25]|callback_check_valida_rg');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|valid_email|max_length[45]|callback_check_email');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('vendedor_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'required|max_length[45]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[45]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'trim|max_length[500]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'vendedor_codigo',
                            'vendedor_nome_completo',
                            'vendedor_cpf',
                            'vendedor_data_cadastro',
                            'vendedor_rg',
                            'vendedor_email',
                            'vendedor_telefone',
                            'vendedor_celular',
                            'vendedor_endereco',
                            'vendedor_cep',
                            'vendedor_cidade',
                            'vendedor_bairro',
                            'vendedor_complemento',
                            'vendedor_obs',
                            'vendedor_ativo',
                            'vendedor_data_alteracao'
                        ), $this->input->post()
                );


                $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));

                $data = html_escape($data);
                
                $this->core_model->update('vendedores', $data, array('vendedor_id'=> $vendedor_id));

                redirect('vendedores');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizar Fornecedores',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                        'js/clientes.js'
                    ),
                    'vendedor' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('vendedores/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function add() {
        
        
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'required|max_length[145]');
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|exact_length[14]|is_unique[vendedores.vendedor_cpf]|callback_valida_cpf');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|max_length[25]|is_unique[vendedores.vendedor_rg]|callback_check_valida_rg');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|valid_email|max_length[45]|is_unique[vendedores.vendedor_email]|callback_check_email');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('vendedor_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'required|max_length[45]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[45]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'trim|max_length[500]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'vendedor_codigo',
                            'vendedor_nome_completo',
                            'vendedor_cpf',
                            'vendedor_data_cadastro',
                            'vendedor_rg',
                            'vendedor_email',
                            'vendedor_telefone',
                            'vendedor_celular',
                            'vendedor_endereco',
                            'vendedor_cep',
                            'vendedor_cidade',
                            'vendedor_bairro',
                            'vendedor_complemento',
                            'vendedor_obs',
                            'vendedor_ativo'
                        ), $this->input->post()
                );


                $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));

                $data = html_escape($data);
                
                $this->core_model->insert('vendedores', $data);

                redirect('vendedores');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Cadastrando Vendedores',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                        'js/clientes.js'
                    ),
                    'vendedor_codigo' => $this->core_model->generate_unique_code('vendedores','numeric',8,'vendedor_codigo'),
                    
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('vendedores/add');
                $this->load->view('layout/footer');
            }
    }
   
    
    
    public function del($vendedor_id = NULL) {
        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))) {
            $this->session->set_flashdata('error', 'Vendedor não localizado');
            redirect('vendedores');
        } else {

            $this->core_model->delete('vendedores', array('vendedor_id' => $vendedor_id));
            redirect('vendedores');
        }
    }

    public function check_valida_rg($vendedor_rg) {

        $vendedor_id = $this->input->post('vendedor_id');


        if ($this->core_model->get_by_id('vendedores', array('vendedor_rg' => $vendedor_rg, 'vendedor_id !=' => $vendedor_id))) {
            $this->form_validation->set_message('check_rg', 'Esse Documento ja existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_email($vendedor_email) {

        $vendedor_id = $this->input->post('vendedor_id');

        if ($this->core_model->get_by_id('vendedores', array('vendedor_id !='=> $vendedor_id, 'vendedor_email'=>$vendedor_email))) {
            $this->form_validation->set_message('check_email', 'Esse Email ja existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

   public function valida_cpf($cpf) {

        if ($this->input->post('vendedor_id')) {

            $vendedor_id = $this->input->post('vendedor_id');

            if ($this->core_model->get_by_id('vendedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cpf' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    //$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
                    $d += $cpf[$c] * (($t + 1) - $c); // Para PHP com versão < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

}