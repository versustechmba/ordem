
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('clientes') ?>">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <form class="user" method="POST" name="form_add">

                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="pessoa_fisica" name="cliente_tipo" class="custom-control-input" value="1" <?php echo set_checkbox('cliente_tipo', '1') ?> checked="">
                    <label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa física</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="pessoa_juridica" name="cliente_tipo" class="custom-control-input" value="2" <?php echo set_checkbox('cliente_tipo', '2') ?> >
                    <label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa jurídica</label>
                </div>


                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados do Cliente</i></legend>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome/Razão do Cliente</label>
                            <input type="text" class="form-control form-control-user" name="cliente_nome" value="<?php echo set_value('cliente_nome'); ?>">
                            <?php echo form_error('cliente_nome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Nome Fantasia/Apelido</label>
                            <input type="text" class="form-control form-control-user" name="cliente_apelido"  value="<?php echo set_value('cliente_apelido'); ?>">
                            <?php echo form_error('cliente_apelido', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control form-control-user-date" name="cliente_dt_nascimento" value="<?php echo set_value('cliente_dt_nascimento'); ?>">
                            <?php echo form_error('cliente_dt_nascimento', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Celular</label>
                            <input type="text" class="form-control form-control-user" name="cliente_fone"  value="<?php echo set_value('cliente_fone'); ?>">
                            <?php echo form_error('cliente_fone', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-2">

                            <div class="pessoa_fisica">

                                <label>CPF do Cliente</label>
                                <input type="text" class="form-control form-control-user cpf" name="cliente_cpf" value="<?php echo set_value('cliente_cpf'); ?>">
                                <?php echo form_error('cliente_cpf', '<small class="form-text text-danger">', '</small>') ?>

                            </div>

                            <div class="pessoa_juridica">

                                <label>CNPJ do Cliente</label>
                                <input type="text" class="form-control form-control-user cnpj" name="cliente_cnpj" value="<?php echo set_value('cliente_cnpj'); ?>">
                                <?php echo form_error('cliente_cnpj', '<small class="form-text text-danger">', '</small>') ?>


                            </div>

                        </div>
                        <div class="col-md-2">

                            <label class="pessoa_fisica">RG do Cliente</label>
                            <label class="pessoa_juridica">IE do Cliente</label>

                            <input type="text" class="form-control form-control-user" name="cliente_rg_ie"  value="<?php echo set_value('cliente_rg_ie'); ?>">
                            <?php echo form_error('cliente_rg_ie', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" name="cliente_email" value="<?php echo set_value('cliente_email'); ?>">
                            <?php echo form_error('cliente_email', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Fone 2</label>
                            <input type="text" class="form-control form-control-user" name="cliente_fone2"  value="<?php echo set_value('cliente_fone2'); ?>">
                            <?php echo form_error('cliente_fone2', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Endereço do Cliente</i></legend>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="cliente_endereco" value="<?php echo set_value('cliente_endereco'); ?>">
                            <?php echo form_error('cliente_endereco', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-1">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user" name="cliente_uf"  value="<?php echo set_value('cliente_uf'); ?>">
                            <?php echo form_error('cliente_uf', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Cep</label>
                            <input type="text" class="form-control form-control-user cep" name="cliente_cep"  value="<?php echo set_value('cliente_cep'); ?>">
                            <?php echo form_error('cliente_cep', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="cliente_xmunicipio"  value="<?php echo set_value('cliente_xmunicipio'); ?>">
                            <?php echo form_error('cliente_cidade', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Bairro</label>
                            <input type="text" class="form-control form-control-user" name="cliente_bairro"  value="<?php echo set_value('cliente_bairro'); ?>">
                            <?php echo form_error('cliente_bairro', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                </fieldset>

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Configurações</i></legend>

                    <div class="form-group row">

                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="cliente_ativo">
                                <option value="0" >Não</option>
                                <option value="1" >Sim</option>
                            </select>

                        </div>

                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                
            </form>

        </div>
    </div>