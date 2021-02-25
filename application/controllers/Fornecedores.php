<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Fornecedores extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Fornecedores Cadastrados',
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
            'tab_fornecedor' => $this->core_model->get_all('fornecedores'),
        );


        $this->load->view('layout/reader', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
    }

    public function add() {


        $this->form_validation->set_rules('fornecedor_razao', '', 'required|max_length[200]');
        $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'required|max_length[145]');
        $this->form_validation->set_rules('fornecedor_data_cadastro', '', 'required');
        $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[18]|is_unique[fornecedores.fornecedor_cnpj]|callback_valida_cnpj');
        $this->form_validation->set_rules('fornecedor_email', '', 'trim|valid_email|max_length[50]|is_unique[fornecedores.fornecedor_email]');
        $this->form_validation->set_rules('fornecedor_ie', '', 'trim|max_length[20]|is_unique[fornecedores.fornecedor_ie]|callback_check_rg_ie');
        $this->form_validation->set_rules('fornecedor_celular', '', 'trim|max_length[15]');
        $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|max_length[15]');
        $this->form_validation->set_rules('fornecedor_contato', '', 'trim|max_length[15]');
        $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('fornecedor_endereco', '', 'required|max_length[155]');
        $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|max_length[20]');
        $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
        $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('fornecedor_obs', '', 'trim|max_length[500]');

            
        
        
        if ($this->form_validation->run()) {

            
            
            $data = elements(
                    array(
                        'fornecedor_razao',
                        'fornecedor_nome_fantasia',
                        'fornecedor_data_cadastro',
                        'fornecedor_cnpj',
                        'fornecedor_ie',
                        'fornecedor_email',
                        'fornecedor_telefone',
                        'fornecedor_celular',
                        'fornecedor_contato',
                        'fornecedor_endereco',
                        'fornecedor_cep',
                        'fornecedor_cidade',
                        'fornecedor_bairro',
                        'fornecedor_obs',
                        'fornecedor_ativo'
                    ), $this->input->post()
            );


            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));

            $data = html_escape($data);
                        
            $this->core_model->insert('fornecedores', $data);

            redirect('fornecedores');
        } else {
           
            
            // Erro de Validação               

            $data = array(
                'titulo' => 'Cadastrar Fornecedores',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js'
                )
            );



            $this->load->view('layout/reader', $data);
            $this->load->view('fornecedores/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($fornecedor_id = NULL) {
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {
            $this->session->set_flashdata('error', 'Cliente não localizado');
            redirect('fornecedores');
        } else {

            $this->form_validation->set_rules('fornecedor_nome_razao', '', 'required|max_length[200]');
            $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'required|max_length[145]');
            $this->form_validation->set_rules('fornecedor_data_cadastro', '', 'required');
            $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[18]|callback_valida_cnpj');
            $this->form_validation->set_rules('fornecedor_email', '', 'trim|valid_email|max_length[50]');
            $this->form_validation->set_rules('fornecedor_ie', '', 'trim|max_length[20]|callback_check_rg_ie');
            $this->form_validation->set_rules('fornecedor_celular', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('fornecedor_contato', '', 'trim|max_length[15]');
            $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('fornecedor_endereco', '', 'required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs', '', 'trim|max_length[500]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'fornecedor_razao',
                            'fornecedor_nome_fantasia',
                            'fornecedor_data_cadastro',
                            'fornecedor_cnpj',
                            'fornecedor_ie',
                            'fornecedor_email',
                            'fornecedor_telefone',
                            'fornecedor_celular',
                            'fornecedor_contato',
                            'fornecedor_endereco',
                            'fornecedor_cep',
                            'fornecedor_cidade',
                            'fornecedor_bairro',
                            'fornecedor_obs',
                            'fornecedor_ativo'
                        ), $this->input->post()
                );


                $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));

                $data = html_escape($data);
                
                $this->core_model->update('fornecedores', $data, array('fornecedor_id'=> $fornecedor_id));

                redirect('fornecedores');
            } else {

                // Erro de Validação               

                $data = array(
                    'titulo' => 'Atualizar Fornecedores',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                        'js/clientes.js'
                    ),
                    'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),
                );



                $this->load->view('layout/reader', $data);
                $this->load->view('fornecedores/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($fornecedor_id = NULL) {
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $cliente_id))) {
            $this->session->set_flashdata('error', 'Fornecedor não localizado');
            redirect('fornecedores');
        } else {

            $this->core_model->delete('fornecedores', array('fornecedor_id' => $cliente_id));
            redirect('fornecedores');
        }
    }

    public function check_rg_ie($fornecedor_ie) {

        $fornecedor_id = $this->input->post('fornecedor_id');


        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie, 'fornecedor_id !=' => $fornecedor_id))) {
            $this->form_validation->set_message('check_rg_ie', 'Esse Documento ja existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_email($fornecedor_email) {

        $fornecedor_id = $this->input->post('fornecedor_id');

        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {
            $this->form_validation->set_message('check_email', 'Esse Email ja existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        if ($this->input->post('fornecedor_id')) {

            $cliente_id = $this->input->post('fornecedor_id');

            if ($this->core_model->get_by_id('fornecedores', array('fornecedor_id !=' => $cliente_id, 'fornecedor_cnpj' => $cnpj))) {
                $this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já existe');
                return FALSE;
            }
        }

        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpj) != 14) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
                $cnpj == '11111111111111' ||
                $cnpj == '22222222222222' ||
                $cnpj == '33333333333333' ||
                $cnpj == '44444444444444' ||
                $cnpj == '55555555555555' ||
                $cnpj == '66666666666666' ||
                $cnpj == '77777777777777' ||
                $cnpj == '88888888888888' ||
                $cnpj == '99999999999999') {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);
                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj[12] == $digito1) and ( $cnpj[13] == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }

}
