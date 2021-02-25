<?php

defined('BASEPATH') OR exit('Ação não Permitida');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou... Reconecte Novamente!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Usuários Cadastrados',
            'usuario_logado' => $this->core_model->get_by_id('users', array('users.id' => $this->session->userdata('user_id'))),
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
                'vendor/datatables/dataTables.bootstrap4.css'
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
                'js/demo/datatables-demo.js'
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        );


        $this->load->view('layout/reader', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $data = array(
            'titulo' => 'Cadastrando Usuário',
            'usuario_logado'=> $this->core_model->get_by_id('users', array('users.id'=>$this->session->userdata('user_id'))),
        );

        $this->load->view('layout/reader', $data);
        $this->load->view('usuarios/add');
        $this->load->view('layout/footer');


        $this->form_validation->set_rules('first_name', 'campo nome', 'trim|required');
        $this->form_validation->set_rules('last_name', '', 'trim|required');
        $this->form_validation->set_rules('email', '', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', '', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', '', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('confirm_password', '', 'matches[password]');

        if ($this->form_validation->run()) {

            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $additional_data = array(
                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'active' => $this->input->post('active')
            );
            $group = array($this->input->post('perfil_usuario'));

            $additional_data = $this->security->xss_clean($additional_data);
            $group = $this->security->xss_clean($group);

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->session->set_flashdata('sucesso', 'Usuario Cadastrado com sucesso');
            } else {
                $this->session->set_flashdata('error', 'Erro ao Cadastrar Usuário');
            }

            redirect('usuarios');
        }
    }

    public function del($usuario_id = NULL) {

        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário inexistente!');
            redirect('usuarios');
        }

        if ($this->ion_auth->is_admin($usuario_id)) {
            $this->session->set_flashdata('error', 'Sem permissão para excluir usuairo com perfil de Administrador!');
            redirect('usuarios');
        }

        if ($this->ion_auth->delete_user($usuario_id)) {
            $this->session->set_flashdata('Usuario Removido com sucesso!');
            redirect('usuarios');
        } else {
            $this->session->set_flashdata('Usuário não encontrado!');
            redirect('usuarios');
        }
    }

    public function edit($usuario_id = NULL) {

        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário Não Encontrado');
            redirect('usuarios');
        } else {

            $this->form_validation->set_rules('first_name', 'campo nome', 'trim|required');
            $this->form_validation->set_rules('last_name', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
            $this->form_validation->set_rules('password', '', 'min_length[5]|max_length[50]');
            $this->form_validation->set_rules('confirm_password', '', 'matches[password]');

            if ($this->form_validation->run()) {

                $data = elements(
                        array(
                            'first_name',
                            'last_name',
                            //  'email',
                            'username',
                            'active',
                            'password'
                        ), $this->input->post()
                );

                $data = $this->security->xss_clean($data);

                /* Verifica se foi informado a senha */
                $password = $this->input->post('password');
                if (!$password) {
                    unset($data['password']);
                }


//                           echo '<pre>';
//                           print_r($data);
//                           exit();

                if ($this->ion_auth->update($usuario_id, $data)) {
                    $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $perfil_usuario_post = $this->input->post('perfil_usuario');

//                      /* se for diferente atualiza o grupo*/
                    if ($perfil_usuario_post != $perfil_usuario_db->id) {
                        $this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
                        $this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);
                    }

                    $this->session->set_flashdata('sucesso', 'Registro atualizado com sucesso');
                } else {

                    $this->session->set_flashdata('error', 'Erro ao atualizar dados');
                }

                redirect('usuarios');
            } else {
                $data = array(
                    'titulo' => 'Alterando Usuário',
                    'usuario' => $this->ion_auth->user($usuario_id)->row(),
                    'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row()
                );

                $this->load->view('layout/reader', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function email_check($email) {
        $usuario_id = $this->input->post('usuario_id');
        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', 'Esse email ja existe');
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function username_check($username) {
        $usuario_id = $this->input->post('usuario_id');
        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', 'Esse usuario ja existe');
            return false;
        } else {

            return true;
        }
    }

}
