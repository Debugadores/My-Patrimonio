<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../auth-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>MyPatrimonio | Cadastrar Clientes</title>
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a href="index.php" style="display: flex; align-items: center; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0a2463" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>

                            <!-- Espaçamento entre icone e escrita -->
                            <a> </a>

                            <span style="
                            font-size: 1.5rem;
                            font-weight: bold;
                            background: linear-gradient(135deg, #0a2463 0%, #247ba0 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                            ">   
                             MyPatrimônio
                            </span>
                        </a>
                        </div>
 
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Pesquisar..." aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Olá, </span> 
                                <span class="text-dark">
                                    <?php 
                                        // Inicie a sessão e exiba o nome do usuário logado
                                    
                                        echo isset($_SESSION["usuario"]) ? htmlspecialchars($_SESSION["usuario"]) : "Usuário";
                                    ?>
                                </span> 
                                <i data-feather="chevron-down" class="svg-icon"></i>
                            </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Meu Perfil</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Meu Saldo</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Caixa de Entrada</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Configuração da Conta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Sair</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                    Perfil</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                                    <li class="list-divider"></li>
                
                        <!-- Seção Clientes -->
                <li class="nav-small-cap"><span class="hide-menu">Clientes</span></li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Gerenciar Clientes</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="cadastro-cliente.php" class="sidebar-link">
                                <span class="hide-menu">Novo Cliente</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="mp-lista-clientes.php" class="sidebar-link">
                                <span class="hide-menu">Lista de Clientes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="importar-clientes.php" class="sidebar-link">
                                <span class="hide-menu">Importar Clientes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="categorias-clientes.php" class="sidebar-link">
                                <span class="hide-menu">Categorias</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Seção Vendas -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Vendas</span></li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="shopping-cart" class="feather-icon"></i>
                        <span class="hide-menu">Pedidos</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="novo-pedido.php" class="sidebar-link">
                                <span class="hide-menu">Novo Pedido</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="lista-pedidos.php" class="sidebar-link">
                                <span class="hide-menu">Lista de Pedidos</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="orcamentos.php" class="sidebar-link">
                                <span class="hide-menu">Orçamentos</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="package" class="feather-icon"></i>
                        <span class="hide-menu">Produtos</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="cadastro-produto.php" class="sidebar-link">
                                <span class="hide-menu">Novo Produto</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="lista-produtos.php" class="sidebar-link">
                                <span class="hide-menu">Lista de Produtos</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="categorias-produtos.php" class="sidebar-link">
                                <span class="hide-menu">Categorias</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="estoque.php" class="sidebar-link">
                                <span class="hide-menu">Controle de Estoque</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Seção Financeiro -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Financeiro</span></li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="dollar-sign" class="feather-icon"></i>
                        <span class="hide-menu">Caixa</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="contas-receber.php" class="sidebar-link">
                                <span class="hide-menu">Contas a Receber</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="contas-pagar.php" class="sidebar-link">
                                <span class="hide-menu">Contas a Pagar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="fluxo-caixa.php" class="sidebar-link">
                                <span class="hide-menu">Fluxo de Caixa</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Documentos Fiscais</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="notas-fiscais.php" class="sidebar-link">
                                <span class="hide-menu">Notas Fiscais</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorios-fiscais.php" class="sidebar-link">
                                <span class="hide-menu">Relatórios Fiscais</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Seção Relatórios -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Relatórios</span></li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="bar-chart-2" class="feather-icon"></i>
                        <span class="hide-menu">Relatórios</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="relatorio-vendas.php" class="sidebar-link">
                                <span class="hide-menu">Relatório de Vendas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorio-financeiro.php" class="sidebar-link">
                                <span class="hide-menu">Relatório Financeiro</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorio-produtos.php" class="sidebar-link">
                                <span class="hide-menu">Relatório de Produtos</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="relatorio-clientes.php" class="sidebar-link">
                                <span class="hide-menu">Relatório de Clientes</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Seção Configurações -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Configurações</span></li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="settings" class="feather-icon"></i>
                        <span class="hide-menu">Configurações</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="config-empresa.php" class="sidebar-link">
                                <span class="hide-menu">Dados da Empresa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="usuarios.php" class="sidebar-link">
                                <span class="hide-menu">Usuários</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="perfis-acesso.php" class="sidebar-link">
                                <span class="hide-menu">Perfis de Acesso</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="backup.php" class="sidebar-link">
                                <span class="hide-menu">Backup do Sistema</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="logout.php" aria-expanded="false">
                        <i data-feather="log-out" class="feather-icon"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Conteúdo da Página -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Cadastro de Cliente</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Novo Cliente</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="processa_cliente.php" method="POST">
                                    <!-- Dados Pessoais -->
                                    <h4 class="card-title mb-4">Dados Pessoais</h4>
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de Pessoa*</label>
                                                <select class="form-control" name="tipo_pessoa" id="tipo_pessoa" required>
                                                    <option value="">Selecione...</option>
                                                    <option value="F">Pessoa Física</option>
                                                    <option value="J">Pessoa Jurídica</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="label_nome">Nome/Razão Social*</label>
                                                <input type="text" class="form-control" name="nome" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="label_documento">CPF/CNPJ*</label>
                                                <input type="text" class="form-control" name="documento" id="documento" disabled required>
                                            </div>
                                        </div>
                                        <!-- Campo para RG -->
                                        <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label id="label_rg_ie">RG/IE*</label>
                                            <input type="text" class="form-control" name="rg_ie" id="rg_ie" disabled required>
                                        </div>
                                    
                                    </div>
                                    </div>

                                    <div class="row">
                                        <!-- Campo para Data de Nascimento (somente para pessoa física) -->
                                        <div class="col-md-6" id="div_data_nascimento" style="display: none;">
                                            <div class="form-group">
                                                <label>Data de Nascimento*</label>
                                                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telefone*</label>
                                                <input type="tel" class="form-control" name="telefone" id="telefone" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Endereço -->
                                    <h4 class="card-title mb-4 mt-4">Endereço</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" class="form-control" name="cep">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Logradouro*</label>
                                                <input type="text" class="form-control" name="logradouro" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Número</label>
                                                <input type="text" class="form-control" name="numero">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input type="text" class="form-control" name="complemento">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bairro*</label>
                                                <input type="text" class="form-control" name="bairro" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cidade*</label>
                                                <input type="text" class="form-control" name="cidade" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado*</label>
                                                <select class="form-control" name="estado" required>
                                                    <option value="">Selecione...</option>
                                                    <option value="AC">Acre</option>
                                                    <option value="AL">Alagoas</option>
                                                    <option value="AP">Amapá</option>
                                                    <option value="AM">Amazonas</option>
                                                    <option value="BA">Bahia</option>
                                                    <option value="CE">Ceará</option>
                                                    <option value="DF">Distrito Federal</option>
                                                    <option value="ES">Espírito Santo</option>
                                                    <option value="GO">Goiás</option>
                                                    <option value="MA">Maranhão</option>
                                                    <option value="MT">Mato Grosso</option>
                                                    <option value="MS">Mato Grosso do Sul</option>
                                                    <option value="MG">Minas Gerais</option>
                                                    <option value="PA">Pará</option>
                                                    <option value="PB">Paraíba</option>
                                                    <option value="PR">Paraná</option>
                                                    <option value="PE">Pernambuco</option>
                                                    <option value="PI">Piauí</option>
                                                    <option value="RJ">Rio de Janeiro</option>
                                                    <option value="RN">Rio Grande do Norte</option>
                                                    <option value="RS">Rio Grande do Sul</option>
                                                    <option value="RO">Rondônia</option>
                                                    <option value="RR">Roraima</option>
                                                    <option value="SC">Santa Catarina</option>
                                                    <option value="SP">São Paulo</option>
                                                    <option value="SE">Sergipe</option>
                                                    <option value="TO">Tocantins</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informações Adicionais -->
                                    <h4 class="card-title mb-4 mt-4">Informações Adicionais</h4>
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Limite de Crédito</label>
                                                <input type="number" class="form-control" name="limite_credito" step="0.01">
                                            </div>
                                        </div>
                                        <!-- Campo para Upload de Imagem -->
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Foto do Cliente</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="foto_cliente" name="foto_cliente" accept="image/*">
                                                        <label class="custom-file-label" for="foto_cliente">Escolher arquivo...</label>
                                                    </div>
                                                    <div id="preview_foto" class="mt-2" style="max-width: 200px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Observações</label>
                                                <textarea class="form-control" name="observacoes" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Campos do Responsável (inicialmente ocultos) -->
                                    <div id="dados_responsavel" style="display: none;">
                                        <h4 class="card-title mb-4">Dados do Responsável</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome do Responsável*</label>
                                                    <input type="text" class="form-control" name="nome_responsavel" id="nome_responsavel">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CPF do Responsável*</label>
                                                    <input type="text" class="form-control" name="cpf_responsavel" id="cpf_responsavel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>RG do Responsável*</label>
                                                    <input type="text" class="form-control" name="rg_responsavel" id="rg_responsavel">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telefone do Responsável*</label>
                                                    <input type="tel" class="form-control" name="telefone_responsavel" id="telefone_responsavel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botões -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success mr-2">Salvar</button>
                                            <button type="reset" class="btn btn-danger mr-2">Limpar</button>
                                            <a href="lista-clientes.php" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Script para controlar o tipo de pessoa e máscaras -->
    <script>
        $(document).ready(function(){
    // Primeiro adicione este HTML no seu documento, preferencialmente logo após o fechamento do form
    $('body').append(`
        <div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmar Alteração</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Alterar o tipo de pessoa irá limpar todos os campos preenchidos. Deseja continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnConfirmarLimpeza">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    `);

    // Inicializa máscaras
    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '000.000.000-00' : '00.000.000/0000-00';
    };
    
    var options = {
        onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
    };

    // Máscaras para campos
    $('#telefone').mask('(00) 00000-0000');
    $('#telefone_responsavel').mask('(00) 00000-0000');
    $('#cpf_responsavel').mask('000.000.000-00');

    // Função para limpar campos do formulário
    function limparCampos() {
        // Limpa os campos principais
        $('#documento').val('');
        $('#rg_ie').val('');
        $('#data_nascimento').val('');
        
        // Limpa os campos do responsável
        $('#nome_responsavel').val('');
        $('#cpf_responsavel').val('');
        $('#rg_responsavel').val('');
        $('#telefone_responsavel').val('');
        
        // Remove classes de validação se existirem
        $('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
        
        // Limpa o preview da foto se existir
        $('#preview_foto').empty();
        $('#foto_cliente').val('');
    }

    // Variáveis para controle do tipo de pessoa
    let novoTipo = null;
    let tipoAnterior = null;

    // Controle do tipo de pessoa
    $('#tipo_pessoa').change(function(){
        var tipo = $(this).val();
        tipoAnterior = $(this).data('last-value');
        novoTipo = tipo;

        var documento = $('#documento');
        var rgIe = $('#rg_ie');
        var dataNascimento = $('#data_nascimento');

        // Verifica se há dados preenchidos
        if (documento.val() || rgIe.val() || dataNascimento.val()) {
            $('#modalConfirmacao').modal('show');
            return;
        }

        // Se não houver dados, prossegue com a mudança
        realizarMudancaTipo(tipo);
    });

    // Listener para o botão de confirmação do modal
    $('#btnConfirmarLimpeza').click(function() {
        $('#modalConfirmacao').modal('hide');
        limparCampos();
        realizarMudancaTipo(novoTipo);
    });

    // Quando o modal for fechado sem confirmar, reverte a seleção
    $('#modalConfirmacao').on('hidden.bs.modal', function () {
        if ($('#tipo_pessoa').val() !== $('#tipo_pessoa').data('last-value')) {
            $('#tipo_pessoa').val($('#tipo_pessoa').data('last-value'));
        }
    });

    // Função para realizar a mudança de tipo
    function realizarMudancaTipo(tipo) {
        var documento = $('#documento');
        var labelDoc = $('#label_documento');
        var labelNome = $('#label_nome');
        var rgIe = $('#rg_ie');
        var labelRgIe = $('#label_rg_ie');
        var divDataNascimento = $('#div_data_nascimento');
        var dataNascimento = $('#data_nascimento');

        // Armazena o valor atual para uso futuro
        $('#tipo_pessoa').data('last-value', tipo);

        // Habilita os campos
        documento.prop('disabled', false);
        rgIe.prop('disabled', false);

        if(tipo === 'F'){
            // Configura para Pessoa Física
            documento.mask('000.000.000-00');
            labelDoc.text('CPF*');
            labelNome.text('Nome Completo*');
            documento.attr('placeholder', '000.000.000-00');
            
            // Configura RG
            rgIe.mask('00.000.000-0');
            labelRgIe.text('RG*');
            rgIe.attr('placeholder', '00.000.000-0');
            
            // Mostra e requer data de nascimento
            divDataNascimento.show();
            dataNascimento.prop('required', true);
            
        } else if(tipo === 'J'){
            // Configura para Pessoa Jurídica
            documento.mask('00.000.000/0000-00');
            labelDoc.text('CNPJ*');
            labelNome.text('Razão Social*');
            documento.attr('placeholder', '00.000.000/0000-00');
            
            // Configura IE
            rgIe.unmask();
            labelRgIe.text('IE*');
            rgIe.attr('placeholder', 'Inscrição Estadual');
            
            // Esconde e remove required da data de nascimento
            divDataNascimento.hide();
            dataNascimento.prop('required', false);
            
            // Esconde dados do responsável se estiverem visíveis
            $('#dados_responsavel').hide();
            $('#dados_responsavel input').prop('required', false);
            
        } else {
            // Reseta os campos
            documento.prop('disabled', true);
            rgIe.prop('disabled', true);
            documento.val('');
            rgIe.val('');
            labelDoc.text('CPF/CNPJ*');
            labelNome.text('Nome/Razão Social*');
            labelRgIe.text('RG/IE*');
            documento.attr('placeholder', '');
            rgIe.attr('placeholder', '');
            
            // Esconde data de nascimento
            divDataNascimento.hide();
            dataNascimento.prop('required', false);
        }
    }

    // Armazena o valor inicial do tipo de pessoa
    $('#tipo_pessoa').data('last-value', $('#tipo_pessoa').val());

    // Preview da imagem
    $('#foto_cliente').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                alert('O arquivo é muito grande! O tamanho máximo é 5MB.');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_foto').html(`<img src="${e.target.result}" class="img-fluid">`);
            }
            reader.readAsDataURL(file);
        }
    });

    // Verificação de idade e campos do responsável
    $('#data_nascimento').change(function() {
        const dataNascimento = new Date(this.value);
        const hoje = new Date();
        const idade = hoje.getFullYear() - dataNascimento.getFullYear();
        const mesAtual = hoje.getMonth() - dataNascimento.getMonth();
        
        if (mesAtual < 0 || (mesAtual === 0 && hoje.getDate() < dataNascimento.getDate())) {
            idade--;
        }
        
        const dadosResponsavel = $('#dados_responsavel');
        const camposResponsavel = $('#dados_responsavel input');
        
        if (idade < 18) {
            dadosResponsavel.slideDown();
            camposResponsavel.prop('required', true);
        } else {
            dadosResponsavel.slideUp();
            camposResponsavel.prop('required', false);
        }
    });

    // Função para validar CPF
    function validaCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g,'');
        if(cpf == '') return false;
        if (cpf.length != 11 || 
            cpf == "00000000000" || 
            cpf == "11111111111" || 
            cpf == "22222222222" || 
            cpf == "33333333333" || 
            cpf == "44444444444" || 
            cpf == "55555555555" || 
            cpf == "66666666666" || 
            cpf == "77777777777" || 
            cpf == "88888888888" || 
            cpf == "99999999999")
            return false;
        
        // Valida 1º dígito
        add = 0;
        for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        
        // Valida 2º dígito
        add = 0;
        for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    }

    // Função para validar CNPJ
    function validaCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g,'');
        if(cnpj == '') return false;
        if (cnpj.length != 14)
            return false;
        
        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" || 
            cnpj == "11111111111111" || 
            cnpj == "22222222222222" || 
            cnpj == "33333333333333" || 
            cnpj == "44444444444444" || 
            cnpj == "55555555555555" || 
            cnpj == "66666666666666" || 
            cnpj == "77777777777777" || 
            cnpj == "88888888888888" || 
            cnpj == "99999999999999")
            return false;
        
        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }

    // Função para validar RG
    function validaRG(rg) {
        // Remove caracteres não numéricos
        rg = rg.replace(/[^\d]+/g,'');
        
        // Verifica se tem 9 dígitos
        if(rg.length !== 9) {
            return false;
        }
        
        // Verifica se não são todos números iguais
        if (/^(\d)\1+$/.test(rg)) {
            return false;
        }
        
        // Calcula o dígito verificador
        const peso = [2, 3, 4, 5, 6, 7, 8, 9];
        const soma = rg.split('')
            .slice(0, 8)
            .reduce((acc, curr, i) => acc + (parseInt(curr) * peso[i]), 0);
        
        const digito = 11 - (soma % 11);
        const digitoVerificador = digito === 11 ? 0 : digito;
        
        return digitoVerificador === parseInt(rg.charAt(8));
    }

    // Função para validar IE
    function validaIE(ie) {
        // Remove caracteres não numéricos
        ie = ie.replace(/[^\d]+/g,'');
        
        // Verifica se tem 12 dígitos (padrão SP)
        if(ie.length !== 12) {
            return false;
        }
        
        // Verifica se não são todos números iguais
        if (/^(\d)\1+$/.test(ie)) {
            return false;
        }
        
        return true; // Implementar lógica específica para cada estado se necessário
    }

    // Validação do formulário
    $('#formCliente').submit(function(e){
        var tipo = $('#tipo_pessoa').val();
        var documento = $('#documento').val();
        var rgIe = $('#rg_ie').val();

        if(tipo === 'F'){
            // Validação de CPF
            if(!validaCPF(documento)){
                e.preventDefault();
                alert('CPF inválido!');
                return;
            }
            
            // Validação do RG
            if (!validaRG(rgIe)) {
                e.preventDefault();
                alert('RG inválido!');
                return;
            }

            // Validação da data de nascimento
            const dataNascimento = new Date($('#data_nascimento').val());
            const hoje = new Date();
            if (dataNascimento > hoje) {
                e.preventDefault();
                alert('Data de nascimento inválida!');
                return;
            }

            // Se for menor de idade, valida os campos do responsável
            const idade = hoje.getFullYear() - dataNascimento.getFullYear();
            if (idade < 18) {
                const cpfResponsavel = $('#cpf_responsavel').val();
                if (!validaCPF(cpfResponsavel)) {
                    e.preventDefault();
                    alert('CPF do responsável inválido!');
                    return;
                }
                
                const rgResponsavel = $('#rg_responsavel').val();
                if (!validaRG(rgResponsavel)) {
                    e.preventDefault();
                    alert('RG do responsável inválido!');
                    return;
                }
            }
        } else if(tipo === 'J'){
            // Validação de CNPJ
            if(!validaCNPJ(documento)){
                e.preventDefault();
                alert('CNPJ inválido!');
                return;
            }

            // Validação da IE
            if (!validaIE(rgIe)) {
                e.preventDefault();
                alert('Inscrição Estadual inválida!');
                return;
            }
        }
    });
});
    </script>
</body>

</html>