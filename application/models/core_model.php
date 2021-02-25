<?php

defined('BASEPATH') OR exit ('Ação Não Permitida');

class Core_Model extends CI_Model {
    
     public function get_all($tabela = NULL, $condicao = NULL) {
       if($tabela){
           if(is_array($condicao)){
               $this->db->where($condicao);
           }
           return $this->db->get($tabela)->result();
       } else {
           return FALSE;
       }
           
    }
    
    public function get_by_id($tabela = NULL, $condicao = NULL) {
        if($tabela && is_array($condicao)){
            $this->db->where($condicao);
            $this->db->limit(1);
            
            return $this->db->get($tabela)->row();
                    
        } else {
            return FALSE;
        }
            
    }
    public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL) {
        if($tabela && is_array($data)){
            $this->db->insert($tabela, $data);
            
            if($get_last_id){
                $this->session->set_userdata('last_id', $this->db->insert_id());  
            }
            
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sucesso','Dados Gravados com Sucesso!'); 
            } else{
                $this->session->set_flashdata('Error','Erro ao Gravar dados'); 
            }
                
            
        } else {
            
        }
    }
    public function update($tabela = NULL, $data = NULL, $condicao = NULL){
        if($tabela && is_array($data) && is_array($condicao)){
            if($this->db->update($tabela, $data, $condicao)){
                $this->session->set_flashdata('sucesso','Dados Atualizados com sucesso');
            } else {
                $this->session->set_flashdata('error','Erro ao Atualizar os dados');
            }
        } else {
            return FALSE;
        }
    }
    public function delete ($tabela = NULL, $condicao = NULL){
        
        $this->db->db_debug = false;
        
        if($tabela && is_array($condicao)){
            $status = $this->db->delete($tabela, $condicao);
            $error =  $this->db->error();
            if(!$status){
                foreach ($error as $code){
                    if($code == 1451){
                        $this->session->set_flashdata('error','esse registro não poderá ser excluido. MOTIVO: Vinculado em outra tabela');
                    }
                } 
            }else{
                $this->session->set_flashdata('sucesso','Registro Apagado com Sucesso!');
            }
            
             $this->db->db_debug = true;
        } else {
           return FALSE;       
        }
        
       
    }
    public function generate_unique_code($table = NULL, $type_of_code = NULL, $size_of_code, $field_search) {

        do {
            $code = random_string($type_of_code, $size_of_code);
            $this->db->where($field_search, $code);
            $this->db->from($table);
        } while ($this->db->count_all_results() >= 1);

        return $code;
    }
    
    public function auto_complete_produtos($busca = null){
        
        if($busca){
            $this->db-like('produto_descricao',$busca, 'both');
            $this->db->where('produto_ativo',1);
            $this->db->where('produto_qtde_estoque > ',0);
            
            return $this->db->get('produtos')->result();
        } else {
            return FALSE;
        }
        
    }    
    
     public function auto_complete_servicos($busca = null){
        
        if($busca){
            $this->db-like('servico_descricao',$busca, 'both');
            $this->db->where('servico_ativo',1);
            
            return $this->db->get('servicos')->result();
            
        } else {
            return FALSE;
        }
        
    }    
}

