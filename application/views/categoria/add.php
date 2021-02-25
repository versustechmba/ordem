
<?php $this->load->view('layout/sidebar'); ?>


<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>       

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('marcas') ?>">Serviços</a></li>
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
                            <label>Nome da Marca</label>
                            <input type="text" class="form-control form-control-user" name="marca_nome" value="<?php echo set_value('marca_nome'); ?>">
                            <?php echo form_error('marca_nome', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                        </div>
                        
                        <div class="col-md-2">
                            <label>Ativo</label>
                            <select class="custom-select" name="marca_ativa">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                        </div>
                       
                    </div>
                    
                    

                </fieldset> 

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

            </form>

        </div>
    </div>