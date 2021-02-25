<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ordem Serviços <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modulos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOs" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database text-gray-900"></i>
            <span>Vendas</span>
        </a>
        <div id="collapseOs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">escolha uma opção:</h6>
                <a title="Vendas" class="collapse-item" href="<?php echo base_url('clientes') ;?>"><i class="fas fa-user-tie text-gray-900"></i>&nbsp;&nbsp;<strong>Vendas</strong></a>
                <a title="Ordem Servicos" class="collapse-item" href="<?php echo base_url('os') ;?>"><i class="fas fa-user-tag text-gray-900"></i>&nbsp;&nbsp;<strong>Ordem de Serviços</strong></a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database text-gray-900"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">escolha uma opção:</h6>
                <a title="Gerenciar Clientes" class="collapse-item" href="<?php echo base_url('clientes') ;?>"><i class="fas fa-user-tie text-gray-900"></i>&nbsp;&nbsp;<strong>Clientes</strong></a>
                <a title="Gerenciar Fornecedores" class="collapse-item" href="<?php echo base_url('fornecedores') ;?>"><i class="fas fa-user-tag text-gray-900"></i>&nbsp;&nbsp;<strong>Fornecedores</strong></a>
                <a title="Gerenciar Vendedores" class="collapse-item" href="<?php echo base_url('vendedores') ;?>"><i class="fas fa-user-secret text-gray-900"></i>&nbsp;&nbsp;<strong>Vendedores</strong></a>
            </div>
        </div>
    </li>
    
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTres" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database text-gray-900"></i>
            <span>Estoque</span>
        </a>
        <div id="collapseTres" class="collapse" aria-labelledby="headingTres" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">escolha uma opção:</h6>
                <a title="Gerenciar Serviços" class="collapse-item" href="<?php echo base_url('servicos') ;?>"><i class="fas fa-laptop text-gray-900"></i>&nbsp;&nbsp;<strong>Serviços</strong></a>
                <a title="Gerenciar Marcas" class="collapse-item" href="<?php echo base_url('marcas') ;?>"><i class="fas fa-address-book text-gray-900"></i>&nbsp;&nbsp;<strong>Marcas</strong></a>
                <a title="Gerenciar Categorias" class="collapse-item" href="<?php echo base_url('categoria') ;?>"><i class="fas fa-capsules text-gray-900"></i>&nbsp;&nbsp;<strong>Categorias</strong></a>
                <a title="Gerenciar Produtos" class="collapse-item" href="<?php echo base_url('produtos') ;?>"><i class="fas fa-capsules text-gray-900"></i>&nbsp;&nbsp;<strong>Produtos</strong></a>
            </div>
        </div>
    </li>

 


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configurações
    </div>



    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('usuarios') ?>">
            <i class="fas fa-users"></i>
            <span>Usuarios</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('sistema'); ?>">
            <i class="fas fa-cogs"></i>
            <span>Sistemas</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">