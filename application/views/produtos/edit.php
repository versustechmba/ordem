
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('produtos') ?>">Serviços</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong><i class="fas fa-user-clock"></i>&nbsp;&nbsp;Ult. Atualização :&nbsp;</strong>  <?php echo formata_data_banco_com_hora($produto->produto_data_alteracao); ?></p>

            <form class="user" method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados do Produto</i></legend>

                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Código</label>
                            <input type="text" class="form-control form-control-user" name="produto_codigo" value="<?php echo $produto->produto_codigo; ?>">
                            <?php echo form_error('produto_codigo', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-8">
                            <label>Descrição do Produto</label>
                            <input type="text" class="form-control form-control-user" name="produto_descricao" value="<?php echo $produto->produto_descricao; ?>">
                            <?php echo form_error('produto_descricao', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>


                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Marca</label>
                            <select class="custom-select" name="produto_marca_id">

                                <?php foreach ($marcas as $marca): ?>
                                    <option value="<?php echo $marca->marca_id; ?>" <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : '') ?> ><?php echo $marca->marca_nome; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>


                </fieldset> 

                <input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>