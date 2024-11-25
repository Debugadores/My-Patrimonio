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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="login/assets/img/favicon/logo.ico">
    <title>MyPatrimonio | Consulta de Clientes</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- This page plugin CSS -->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.php" style="display: flex; align-items: center; text-decoration: none;">
                            <!-- Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0a2463" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>

                            <!-- Espaçamento entre icone e escrita -->
                            <a> </a>

                            <!-- Brand Text -->
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
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
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
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
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
                        
                        <!-- End Notification -->
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
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
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
                            <a href="mp-cadastro-cliente.php" class="sidebar-link">
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
                        <span class="hide-menu">Patrimônios</span>
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

        <div class="page-wrapper">
            <!-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Olá, <?php 
                                        // Inicie a sessão e exiba o nome do usuário logado
                                    
                                        echo isset($_SESSION["usuario"]) ? htmlspecialchars($_SESSION["usuario"]) : "Usuário";
                                    ?></h3>
                    </div>
                </div>
            </div> -->
            <div class="container-fluid">
                <!-- multi-column ordering -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Consulta de Clientes</h4>
                                <!--<h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                                    then a secondary column if the data in the first column is identical), through the
                                    <code> columns.orderData</code> option.</h6>-->
                                <div class="table-responsive">
                                    <table id="multi_col_order"
                                        class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome/Razão Social</th>
                                                <th>Telefone</th>
                                                <th>CPF/CNPJ</th>
                                                <th>RG/IE</th>
                                                <th>Cidade</th>
                                                <th>Tipo</th>
                                                <th>Data Nascimento</th>
                                                <th>Gênero</th>
                                                <th>Status</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Consumidor</td>
                                                <td>(00) 00000-0000</td>
                                                <td></td>
                                                <td></td>
                                                <td>Quedas do Iguaçu</td>
                                                <td>Pessoa Física</td>
                                                <td>24/11/2004</td>
                                                <td></td>
                                                <td>Ativo</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Administrador</td>
                                                <td>(00) 00000-0000</td>
                                                <td>111.111.111-11</td>
                                                <td>11.111.111-9</td>
                                                <td>Quedas do Iguaçu</td>
                                                <td>Pessoa Física</td>
                                                <td>24/11/2004</td>
                                                <td>Masculino</td>
                                                <td>Ativo</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center text-muted">
            Todos os direitos reservados pela MIT. Projetado e desenvolvido pela <a
                    href="#">Zenruths & Pillareck</a>.
            </footer>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <!-- Extras -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>

    
</body>

</html>