
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
            <div class="card-header py-3">
                <a title='Cadastrar Novo Vendedor' href="<?php echo base_url('vendedores/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-tie"></i>&nbsp;Adicionar</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center pr-2">Nome Completo</th>
                      <th class="text-center pr-2">Matricula</th>
                      <th class="text-center pr-2">Email</th>
                      <th class="text-center pr-2">Celular</th>
                      <th class="text-center pr-2">Ativo</th>
                      <th class='text-sm-right, text-center pr-2'>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($vendedores as $vendedor): ?>
                    <tr>    
                      <td><?php echo $vendedor->vendedor_id ?></td>
                      <td><?php echo $vendedor->vendedor_nome_completo ?></td>
                      <td><?php echo $vendedor->vendedor_codigo ?></td>
                      <td><?php echo $vendedor->vendedor_email ?></td>
                      <td><?php echo $vendedor->vendedor_celular ?></td>
                      <td class="text-center">
                          <?php echo ($vendedor->vendedor_ativo == 1 ? '<span class="badge badge-primary btn-sm"> Ativo </span>' : '<span class="badge badge-danger btn-sm">Inativo</span>') ?>
                      </td>
                      <td class='text-sm-right'>
                          <a title="Alterar Registro" href="<?php echo base_url('vendedores/edit/'.$vendedor->vendedor_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i>&nbsp;Editar</a>&nbsp;
                          <a title="Apagar Registro" href="javascript(void)" data-toggle="modal" data-target="#vendedor-<?php echo $vendedor->vendedor_id?>" class="btn btn-sm btn-danger"><i class="fas fa-user-minus"></i>&nbsp;Apagar</a>
                      </td>
                    </tr>
                    
                    
                    <!-- modal -->
                     <div class="modal fade" id="vendedor-<?php echo $vendedor->vendedor_id?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apagando Registro Vendedor</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                              <div class="modal-body">Clique no botão <strong>"Sim"</strong> para apagar este Registro</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                              <a class="btn btn-danger btn-sm" href="<?php echo base_url('vendedores/del/'.$vendedor->vendedor_id)?>">Sim</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    
                    
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>