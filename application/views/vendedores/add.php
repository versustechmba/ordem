
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores') ?>">Vendedores</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            

            <form class="user" method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-secret">&nbsp; Dados do Vendedor</i></legend>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Nome Completo Vendedor</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_nome_completo" value="<?php echo set_value('vendedor_nome_completo'); ?>">
                            <?php echo form_error('vendedor_nome_completo', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>CPF</label>
                            <input type="text" class="form-control form-control-user cpf" name="vendedor_cpf"  value="<?php echo set_value('vendedor_cpf'); ?>">
                            <?php echo form_error('vendedor_cpf', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>RG</label>
                            <input type="text" class="form-control form-control-user-date rg" name="vendedor_rg" value="<?php echo set_value('vendedor_rg'); ?>">
                            <?php echo form_error('vendedor_rg', '<small class="form-text text-danger">', '</small>') ?>
                        </div>



                    </div>

                    <div class="form-group row">


                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" name="vendedor_email" value="<?php echo set_value('vendedor_email'); ?>">
                            <?php echo form_error('vendedor_email', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-3">
                            <label>Fone 2</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_telefone"  value="<?php echo set_value('vendedor_telefone'); ?>">
                            <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Celular</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_celular"  value="<?php echo set_value('vendedor_celular'); ?>">
                            <?php echo form_error('vendedor_celular', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Endereço do Fornecedor</i></legend>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_endereco" value="<?php echo set_value('vendedor_endereco'); ?>">
                            <?php echo form_error('vendedor_endereco', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-1">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_estado"  value="<?php echo set_value('vendedor_estado'); ?>">
                            <?php echo form_error('vendedor_estado', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Cep</label>
                            <input type="text" class="form-control form-control-user cep" name="vendedor_cep"  value="<?php echo set_value('vendedor_cep'); ?>">
                            <?php echo form_error('vendedor_cep', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_cidade"  value="<?php echo set_value('vendedor_cidade'); ?>">
                            <?php echo form_error('vendedor_cidade', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Bairro</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_bairro"  value="<?php echo set_value('vendedor_bairro'); ?>">
                            <?php echo form_error('vendedor_bairro', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                </fieldset>

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Configurações</i></legend>

                    <div class="form-group row">

                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="vendedor_ativo">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                        </div>

                        <div class="col-md-3">
                            <label>Matricula</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_codigo"  value="<?php echo $vendedor_codigo; ?> " readonly="">
                            <?php echo form_error('vendedor_codigo', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-7">
                            <label>Observações</label>
                            <input type="text" class="form-control form-control-user" name="vendedor_obs"  value="<?php echo set_value('vendedor_obs'); ?>">
                            <?php echo form_error('vendedor_obs', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>