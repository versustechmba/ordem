
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('servicos') ?>">Serviços</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
           

            <form class="user" method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados do Serviço</i></legend>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome do Serviço</label>
                            <input type="text" class="form-control form-control-user" name="servico_nome" value="<?php echo set_value('servico_nome'); ?>">
                            <?php echo form_error('servico_nome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-3">
                            <label>Preco</label>
                            <input type="text" class="form-control form-control-user money" name="servico_preco"  value="<?php echo set_value('servico_preco'); ?>">
                            <?php echo form_error('servico_preco', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="servico_ativo">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                        </div>
                       
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Serviço Descricao</label>
                            <textarea type="text" class="form-control form-control-user" name="servico_descricao" style="min-height: 100px !important"><?php echo set_value('servico_descricao'); ?></textarea>
                            <?php echo form_error('servico_descricao', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>

                    </div>


                </fieldset> 

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>