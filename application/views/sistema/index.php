
    <?php $this->load->view('layout/sidebar'); ?>
  

      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo?></li>
              </ol>
            </nav>
          
          
              <?php if($message = $this->session->flashdata('sucesso')):?>      
  
          <div class="row">
              <div class="col-md-12">
                  
                      <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                          <strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message?></strong> 
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                      </div>

              </div>
              
            </div>

    <?php endif;?>      
          
          
    <?php if($message = $this->session->flashdata('error')):?>      
  
          <div class="row">
              <div class="col-md-12">
                  
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message?></strong> 
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                      </div>

              </div>
              
          </div>

    <?php endif;?>      
          
<!-- DataTales Example -->
          <div class="card shadow mb-4">
    
            <div class="card-body">
             
                
                <form method="POST" name="form_index" class="user">

                    <div class="form-group row mb-3">
                        <div class="col-md-3">
                            <label>Razao Social</label>
                            <input type="text" class="form-control form-control-user" name="sistema_razao_social" placeholder="Nome Razao Social" value="<?php echo $sistema->sistema_razao_social ?>">
                            <?php echo form_error('sistema_razao_social','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-3">
                            <label>Nome Fantazia</label>
                            <input type="text" class="form-control form-control-user" name="sistema_nome_fantasia" placeholder="Nome Fantazia da Empresa" value="<?php echo $sistema->sistema_nome_fantasia ?>">
                             <?php echo form_error('sistema_nome_fantasia','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                            
                        </div>
                        <div class="col-md-3">
                            <label>CNPJ</label>
                            <input type="text" class="form-control form-control-user cnpj" name="sistema_cnpj" placeholder="CNPJ" value="<?php echo $sistema->sistema_cnpj ?>">
                            <?php echo form_error('sistema_cnpj','<small class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-3">
                            <label>Insc. Estadual</label>
                            <input type="text" class="form-control form-control-user" name="sistema_ie" placeholder="Inscrição Estadual" value="<?php echo $sistema->sistema_ie ?>">
                            <?php echo form_error('sistema_ie','<small class="form-text text-danger">','</small>')?>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <div class="col-md-3">
                            <label>Fone Fixo</label>
                            <input type="text" class="form-control form-control-user phone_with_ddd" name="sistema_telefone_fixo" placeholder="Fone Fixo" value="<?php echo $sistema->sistema_telefone_fixo ?>">
                            <?php echo form_error('sistema_telefone_fixo','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-3">
                            <label>Celular</label>
                            <input type="text" class="form-control form-control-user phone_with_ddd" name="sistema_telefone_movel" placeholder="Celular" value="<?php echo $sistema->sistema_telefone_movel ?>">
                            <?php echo form_error('sistema_telefone_movel','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                            
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" name="sistema_email" placeholder="Email" value="<?php echo $sistema->sistema_email ?>">
                            <?php echo form_error('sistema_email','<small class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-3">
                            <label>Site</label>
                            <input type="text" class="form-control form-control-user" name="sistema_site_url" placeholder="Site da Empresa" value="<?php echo $sistema->sistema_site_url ?>">
                            <?php echo form_error('sistema_site_url','<small class="form-text text-danger">','</small>')?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="sistema_endereco" placeholder="Endereço" value="<?php echo $sistema->sistema_endereco ?>">
                            <?php echo form_error('sistema_endereco','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-2">
                            <label>Cep</label>
                            <input type="text" class="form-control form-control-user cep" name="sistema_cep" placeholder="Cep" value="<?php echo $sistema->sistema_cep ?>">
                            <?php echo form_error('sistema_cep','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-2">
                            <label>Numero</label>
                            <input type="text" class="form-control form-control-user" name="sistema_numero" placeholder="Numero" value="<?php echo $sistema->sistema_numero ?>">
                            <?php echo form_error('sistema_numero','<small class="form-text text-danger">','</small>')?>
                        </div>
                        <div class="col-md-1">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user" name="sistema_estado" placeholder="UF" value="<?php echo $sistema->sistema_estado ?>">
                            <?php echo form_error('sistema_estado','<small class="form-text text-danger">','</small>')?>
                        </div>
                         <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="sistema_cidade" placeholder="Cidade" value="<?php echo $sistema->sistema_cidade ?>">
                            <?php echo form_error('sistema_cidade','<small class="form-text text-danger">','</small>')?>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <label>Texto Ordem de Serviços e Vendas</label>
                            <textarea class="form-control form-control-user" name="sistema_txt_ordem_servico" placeholder="Texto Ordem de Serviços e Vendas"><?php echo $sistema->sistema_txt_ordem_servico ?></textarea>
                            <?php echo form_error('sistema_txt_ordem_servico','<small id="emailHelp" class="form-text text-danger">','</small>')?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>
                
                
            </div>
          </div>