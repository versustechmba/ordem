
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
            <p><strong><i class="fas fa-user-clock"></i>&nbsp;&nbsp;Ult. Atualização :&nbsp;</strong>  <?php echo formata_data_banco_com_hora($cliente->cliente_data_alteracao); ?></p>

            <form class="user" method="POST" name="form_edit">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados do Cliente</i></legend>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome do Cliente</label>
                            <input type="text" class="form-control form-control-user" name="cliente_nome" placeholder="digite nome do cliente" value="<?php echo $cliente->cliente_nome ?>">
                            <?php echo form_error('cliente_nome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Sobrenome do Cliente</label>
                            <input type="text" class="form-control form-control-user" name="cliente_sobrenome" placeholder="Sobrenome do Cliente" value="<?php echo $cliente->cliente_sobrenome ?>">
                            <?php echo form_error('cliente_sobrenome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control form-control-user-date" name="cliente_data_nascimento" value="<?php echo $cliente->cliente_data_nascimento ?>">
                            <?php echo form_error('cliente_data_nascimento', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Celular</label>
                            <input type="text" class="form-control form-control-user" name="cliente_celular" placeholder="Celular" value="<?php echo $cliente->cliente_celular ?>">
                            <?php echo form_error('cliente_celular', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-2">

                            <?php if ($cliente->cliente_tipo == 1) : ?>
                                <label>CPF do Cliente</label>
                                <input type="text" class="form-control form-control-user cpf" name="cliente_cpf" placeholder="<?php echo ($cliente->cliente_tipo == 1 ? 'CPF do Cliente' : 'CNPJ do Cliente'); ?>" value="<?php echo $cliente->cliente_cpf_cnpj; ?>">
                                <?php echo form_error('cliente_cpf', '<small class="form-text text-danger">', '</small>') ?>

                            <?php else: ?>
                                <label>CNPJ do Cliente</label>
                                <input type="text" class="form-control form-control-user cnpj" name="cliente_cnpj" placeholder="<?php echo ($cliente->cliente_tipo == 1 ? 'CPF do Cliente' : 'CNPJ do Cliente'); ?>" value="<?php echo $cliente->cliente_cpf_cnpj; ?>">
                                <?php echo form_error('cliente_cnpj', '<small class="form-text text-danger">', '</small>') ?>

                            <?php endif; ?>   

                        </div>
                        <div class="col-md-2">

                            <?php if ($cliente->cliente_tipo == 1): ?>
                                <label>RG do Cliente</label>
                            <?php else: ?>
                                <label>IE do Cliente</label>
                            <?php endif; ?>

                            <input type="text" class="form-control form-control-user" name="cliente_rg_ie" placeholder="<?php echo ($cliente->cliente_tipo == 1 ? 'RG do Cliente' : 'IE do Cliente'); ?>" value="<?php echo $cliente->cliente_rg_ie; ?>">
                            <?php echo form_error('cliente_rg_ie', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" name="cliente_email" placeholder="Email do Cliente" value="<?php echo $cliente->cliente_email; ?>">
                            <?php echo form_error('cliente_email', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Fone Fixo</label>
                            <input type="text" class="form-control form-control-user" name="cliente_telefone" placeholder="Telefone do Cliente" value="<?php echo $cliente->cliente_telefone; ?>">
                            <?php echo form_error('cliente_telefone', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2">

                    <legend class="font-small"><i class="fas fa-map-marker-alt">&nbsp; Endereço do Cliente</i></legend>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control form-control-user" name="cliente_endereco" placeholder="Endereço do Cliente" value="<?php echo $cliente->cliente_endereco; ?>">
                            <?php echo form_error('cliente_endereco', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-1">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-user" name="cliente_estado" placeholder="UF" value="<?php echo $cliente->cliente_estado; ?>">
                            <?php echo form_error('cliente_estado', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Cep</label>
                            <input type="text" class="form-control form-control-user cep" name="cliente_cep" placeholder="Cep" value="<?php echo $cliente->cliente_cep; ?>">
                            <?php echo form_error('cliente_cep', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control form-control-user" name="cliente_cidade" placeholder="Cidade do Cliente" value="<?php echo $cliente->cliente_cidade ?>">
                            <?php echo form_error('cliente_cidade', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Bairro</label>
                            <input type="text" class="form-control form-control-user" name="cliente_bairro" placeholder="Bairro do Cliente" value="<?php echo $cliente->cliente_bairro ?>">
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
                                <option value="0" <?php echo $cliente->cliente_ativo == 0 ? 'selected' : '' ?> >Não</option>
                                <option value="1" <?php echo $cliente->cliente_ativo == 1 ? 'selected' : '' ?> >Sim</option>
                            </select>

                        </div>

                        <div class="col-md-10">
                            <label>Observação</label>
                            <textarea class="form-control form-control-user form-control-sm" name="cliente_obs" placeholder="Observação do Cliente"><?php echo $cliente->cliente_obs ?></textarea>
                            <?php echo form_error('cliente_obs', '<small class="form-text text-danger">', '</small>') ?>
                        </div>


                    </div>

                </fieldset>

                <input type="hidden" name="cliente_tipo" value="<?php echo $cliente->cliente_tipo ?>">
                <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id ?>">




                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a title='Voltar' href='<?php echo base_url('clientes') ?>' class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i></i>&nbsp;Voltar</a>



            </form>

        </div>
    </div>