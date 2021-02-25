
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('categorias') ?>">Serviços</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
        </ol>
    </nav>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong><i class="fas fa-user-clock"></i>&nbsp;&nbsp;Ult. Atualização :&nbsp;</strong>  <?php echo formata_data_banco_com_hora($categorias->categoria_data_alteracao); ?></p>

            <form class="user" method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                    <legend class="font-small"><i class="fas fa-user-tie">&nbsp; Dados da Categoria</i></legend>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome da Marca</label>
                            <input type="text" class="form-control form-control-user" name="categoria_nome" value="<?php echo $categorias->categoria_nome; ?>">
                            <?php echo form_error('categoria_nome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        
                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="categoria_ativa">
                                <option value="0" <?php echo $categorias->categoria_ativa == 0 ? 'selected' : '' ?> >Não</option>
                                <option value="1" <?php echo $categorias->categoria_ativa == 1 ? 'selected' : '' ?> >Sim</option>
                            </select>

                        </div>
                       
                    </div>
                    
                    

                </fieldset> 

                <input type="hidden" name="categoria_id" value="<?php echo $categorias->categoria_id; ?>">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>