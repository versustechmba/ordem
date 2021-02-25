
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores') ?>">Fornecedores</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong><i class="fas fa-user-clock"></i>&nbsp;&nbsp;Ult. Atualização :&nbsp;</strong>  <?php echo formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao); ?></p>

            <form class="user" method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados do Fornecedor</i></legend>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome Razão do Fornecedor</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_razao" value="<?php echo $fornecedor->fornecedor_razao; ?>">
                            <?php echo form_error('fornecedor_razao', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Nome Fantasia</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_nome_fantasia"  value="<?php echo $fornecedor->fornecedor_nome_fantasia; ?>">
                            <?php echo form_error('fornecedor_nome_fantasia', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Data Cadastro</label>
                            <input type="date" class="form-control form-control-user-date" name="fornecedor_data_cadastro" value="<?php echo $fornecedor->fornecedor_data_cadastro; ?>">
                            <?php echo form_error('fornecedor_data_cadastro', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Celular</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_celular"  value="<?php echo $fornecedor->fornecedor_celular; ?>">
                            <?php echo form_error('fornecedor_celular', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-2">

                            <label>CNPJ do Fornecedor</label>
                            <input type="text" class="form-control form-control-user cnpj" name="fornecedor_cnpj" value="<?php echo $fornecedor->fornecedor_cnpj; ?>">
                            <?php echo form_error('fornecedor_cnpj', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>IE do Fornecedor</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_ie"  value="<?php echo $fornecedor->fornecedor_ie; ?>">
                            <?php echo form_error('fornecedor_ie', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" name="fornecedor_email" value="<?php echo $fornecedor->fornecedor_email; ?>">
                            <?php echo form_error('fornecedor_email', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Fone 2</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_telefone"  value="<?php echo $fornecedor->fornecedor_telefone; ?>">
                            <?php echo form_error('fornecedor_telefone', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Endereço do Fornecedor</i></legend>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_endereco" value="<?php echo $fornecedor->fornecedor_endereco; ?>">
                            <?php echo form_error('fornecedor_endereco', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-1">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_estado"  value="<?php echo $fornecedor->fornecedor_estado; ?>">
                            <?php echo form_error('fornecedor_estado', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Cep</label>
                            <input type="text" class="form-control form-control-user cep" name="fornecedor_cep"  value="<?php echo $fornecedor->fornecedor_cep; ?>">
                            <?php echo form_error('fornecedor_cep', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_cidade"  value="<?php echo $fornecedor->fornecedor_cidade; ?>">
                            <?php echo form_error('fornecedor_cidade', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Bairro</label>
                            <input type="text" class="form-control form-control-user" name="fornecedor_bairro"  value="<?php echo $fornecedor->fornecedor_bairro; ?>">
                            <?php echo form_error('fornecedor_bairro', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                </fieldset>

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Configurações</i></legend>

                    <div class="form-group row">

                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="fornecedor_ativo">
                                <option value="0" <?php echo $fornecedor->fornecedor_ativo == 0 ? 'selected' : '' ?> >Não</option>
                                <option value="1" <?php echo $fornecedor->fornecedor_ativo == 1 ? 'selected' : '' ?> >Sim</option>
                            </select>

                        </div>

                    </div>

                </fieldset>

                <input type="hidden" name="fornecedor_id" value="<?php  echo $fornecedor->fornecedor_id  ?>">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>