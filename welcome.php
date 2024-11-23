<?php

// Inclua o arquivo de configuração
include_once 'config.php';


// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, caso contrário, redirecione-o para a página de login.php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$sql = "SELECT id, usuario,email,telefone,genero,permissao,status,created_at FROM users";
$result = mysqli_query($conection_db, $sql);

$users = array();
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = array(
                'id' => $row['id'],
                'usuario' => $row['usuario'],
                'email' => $row['email'],
                'telefone' => $row['telefone'],
                'genero' => $row['genero'],
                'permissao' => $row['permissao'],
                'status' => $row['status'],
                'created_at' => $row['created_at']
            );
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($conection_db);
}

mysqli_close($conection_db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Início | Projetos</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/code.png" type="image/x-icon">
    <!-- fonte incrível icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animação css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- [Pré-carregador] iniciar -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [Pré-carregador] Fim -->
    <!-- [Menu de navegação] iniciar -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="welcome.php" class="b-brand">
                    <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Projetos</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Home</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="welcome.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Início</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Agendamentos</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Horários</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="sample-page.php" class="">Gerenciar Horários</a></li>
                            <li class=""><a href="" class="">Consultar Horários</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Vendas</label>
                    </li>
                    <li data-username="clientes" class="nav-item">
                        <a href="vendas-produtos.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Realizar Vendas</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Financeiro</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Caixa</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="contas-receber.php" class="">Contas a Receber</a></li>
                            <li class=""><a href="contas-pagar.php" class="">Contas a Pagar</a></li>
                            <li class=""><a href="movimentacao.php" class="">Movimentação</a></li>
                            <li class=""><a href="controle-caixa.php" class="">Seu Caixa</a></li>
                            <li class=""><a href="criar-caixa.php" class="">Criar Caixas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Cadastros</label>
                    </li>
                    <li data-username="clientes" class="nav-item">
                        <a href="clientes.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Clientes</span></a>
                    </li>
                    <li data-username="clientes" class="nav-item">
                        <a href="produtos.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span><span class="pcoded-mtext">Produtos</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Staff</label>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Funcionários</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Analítico</label>
                    </li>
                    <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Gráficos</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Logout</label>
                    </li>
                    <li data-username="Disabled Menu" class="nav-item"><a href="logout.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Sair</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [menu de navegação] fim -->

    <!-- [Cabeçalho] início -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="welcome.php" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Projetos</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Período</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Hoje</a></li>
                        <li><a class="dropdown-item" href="javascript:">Ontem</a></li>
                        <li><a class="dropdown-item" href="javascript:">Essa semana</a></li>
                        <li><a class="dropdown-item" href="javascript:">Esse mês</a></li>
                        <li><a class="dropdown-item" href="javascript:">Esse ano</a></li>
                        <li><a class="dropdown-item" href="javascript:">Personalizado</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Pesquisar">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notificações</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">Marcar como lido</a>
                                    <a href="javascript:">Limpar tudo</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NOVO</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">ANTIGO</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="javascript:">Mostrar tudo</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <?php
                                // Encontrar o índice do usuário logado no array $users
                                $loggedUserId = $_SESSION['id'];
                                $loggedUserIndex = array_search($loggedUserId, array_column($users, 'id'));

                                // Se o usuário logado for encontrado, exiba o nome do usuário
                                if ($loggedUserIndex !== false) {
                                    $loggedUser = $users[$loggedUserIndex];
                                    echo '<span>' . $loggedUser['usuario'] . '</span>';
                                }
                                ?>
                                <a href="logout.php" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i> Configurações</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Perfil</a></li>
                                <li><a href="message.php" class="dropdown-item"><i class="feather icon-mail"></i> Mensagens</a></li>
                                <li><a href="reset_password.php" class="dropdown-item"><i class="feather icon-lock"></i> Alterar Senha</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [Cabeçalho] fim -->

    <!-- [Conteúdo principal] começar -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [migalha] começar -->

                    <!-- [migalha] fim -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [Conteúdo principal] começar -->
                            <div class="row">
                                <!--[seção de vendas diárias] início-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Total Recebido</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ 249.95</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[seção de vendas diárias] fim-->
                                <!--[Seção de vendas mensais] começa-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card Monthly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Total Pago</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>$ 2.942.32</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">36%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Seção de vendas mensais] fim-->
                                <!--[seção de vendas do ano] começa-->
                                <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Lucro</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ 8.638.32</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">80%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[seção de vendas do ano] fim-->
                                <!--[Usuários recentes] começar-->
                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Agendamentos</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">Isabella Christensen</h6>
                                                                <p class="m-0">Lorem Ipsum is simply…</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>11 MAY 12:56</h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Cancelar</a><a href="#!" class="label theme-bg text-white f-12">Confirmar</a></td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">Mathilde Andersen</h6>
                                                                <p class="m-0">Lorem Ipsum is simply text of…</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Cancelar</a><a href="#!" class="label theme-bg text-white f-12">Confirmar</a></td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-3.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">Karla Sorensen</h6>
                                                                <p class="m-0">Lorem Ipsum is simply…</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>9 MAY 17:38</h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Cancelar</a><a href="#!" class="label theme-bg text-white f-12">Confirmar</a></td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">Ida Jorgensen</h6>
                                                                <p class="m-0">Lorem Ipsum is simply text of…</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted f-w-300"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>19 MAY 12:56</h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Cancelar</a><a href="#!" class="label theme-bg text-white f-12">Confirmar</a></td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1">Albert Andersen</h6>
                                                                <p class="m-0">Lorem Ipsum is simply dummy…</p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>21 July 12:56</h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Cancelar</a><a href="#!" class="label theme-bg text-white f-12">Confirmar</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[Usuários recentes] fim-->

                                <!-- [gráfico anual de estatísticas] início -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-event">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <h5 class="m-0">Meta: 100</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                                </div>
                                            </div>
                                            <h2 class="mt-3 f-w-300">45<sub class="text-muted f-14">Agendamentos</sub></h2>
                                            <h6 class="text-muted mt-4 mb-0">Metas de agendamentos (Diário, Semanal, Mensal) </h6>
                                            <i class="feather icon-chevrons-up text-c-purple f-30 m-r-10"></i>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-trending-up f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">235</h3>
                                                    <span class="d-block text-uppercase">TOTAL CONFIRMADOS</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-trending-down f-30 text-c-red"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">26</h3>
                                                    <span class="d-block text-uppercase">TOTAL CANCELADOS</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [gráfico anual de estatísticas] fim -->
                                <!-- [Gráfico de Agendamentos] começo -->
<div class="col-xl-8 col-md-6">
    <div class="card Recent-Users">
        <div class="card-header">
            <h5>Gráfico</h5>
        </div>
        <div class="card-block px-0 py-3">
            <canvas id="doughnutChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>

<script>
    // Dados para o gráfico
    var data = {
        labels: ["Total Recebido", "Total Pago", "Lucro"],
        datasets: [{
            data: [249.95, 2942.32, 8638.32],
            backgroundColor: ["#36a2eb", "#ff6384", "#4bc0c0"]
        }]
    };

    // Configurações do gráfico
    var options = {
        cutoutPercentage: 50, // Define o tamanho do buraco no meio (0-100)
        legend: {
            display: true,
            position: 'bottom'
        }
    };

    // Obtém o contexto do canvas
    var ctx = document.getElementById("doughnutChart").getContext("2d");

    // Cria o gráfico de rosca
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
    });
</script>




<!-- [Gráfico de Agendamentos] fim -->

                            </div>
                            <!-- [Conteúdo principal] fim -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Obrigatório Js -->
    <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <!-- Inclua o Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>
</html>