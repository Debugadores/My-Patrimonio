<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: auth-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPatrimonio - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #00264d 0%, #0066cc 100%);
            min-height: 100vh;
        }

        .dashboard-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
        }

        .shortcut-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            height: 100%;
        }

        .shortcut-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .shortcut-icon {
            font-size: 2.5rem;
            color: #0066cc;
            margin-bottom: 1rem;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .welcome-section {
            margin-bottom: 2rem;
        }

        /* Modal Styles */
        .modal-confirm {
            color: #636363;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 15px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
            justify-content: center;
            background-color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .modal-confirm .modal-title {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .modal-body {
            color: #555;
            text-align: center;
            padding: 20px 0;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn-action {
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.4s;
            width: 120px;
            font-weight: bold;
        }

        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-action:hover, 
        .modal-confirm .btn-action:focus {
            opacity: 0.9;
        }

        .modal-confirm .icon-box-success {
            border-color: #82ce34;
        }

        .modal-confirm .icon-box-success i {
            color: #82ce34;
        }

        .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- <img src="path_to_logo.png" alt="MyPatrimonio" height="40"> -->
            </a>
            <div class="ms-auto">
                <button type="button" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt me-2"></i>Sair
                </button>
            </div>
        </div>
    </nav>

    <!-- Modal de Logout -->
    <div class="modal fade modal-confirm" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Confirmar Saída</h4>
                    <p class="mt-3">Deseja realmente sair do sistema?</p>
                    <p class="text-muted small">Você precisará fazer login novamente para acessar o sistema.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-action me-2" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btn-action" onclick="confirmLogout()">Sair</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sucesso ao Sair -->
    <div class="modal fade modal-confirm" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box icon-box-success">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Saindo do Sistema</h4>
                    <p class="mt-3">Você será redirecionado em instantes...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="dashboard-container">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <h2>Bem-vindo ao MyPatrimonio</h2>
                <p class="text-muted">Selecione uma das opções abaixo para começar</p>
            </div>

            <!-- Shortcuts Grid -->
            <div class="row g-4">
                <!-- Cadastros -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='cadastros.php'">
                        <i class="fas fa-folder-plus shortcut-icon"></i>
                        <h4>Cadastros</h4>
                        <p class="text-muted">Gerenciar registros e cadastros</p>
                    </div>
                </div>

                <!-- Relatórios -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='relatorios.php'">
                        <i class="fas fa-chart-bar shortcut-icon"></i>
                        <h4>Relatórios</h4>
                        <p class="text-muted">Visualizar e exportar relatórios</p>
                    </div>
                </div>

                <!-- Inventário -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='inventario.php'">
                        <i class="fas fa-boxes shortcut-icon"></i>
                        <h4>Inventário</h4>
                        <p class="text-muted">Controle de patrimônio</p>
                    </div>
                </div>

                <!-- Usuários -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='usuarios.php'">
                        <i class="fas fa-users shortcut-icon"></i>
                        <h4>Usuários</h4>
                        <p class="text-muted">Gerenciar usuários do sistema</p>
                    </div>
                </div>

                <!-- Configurações -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='configuracoes.php'">
                        <i class="fas fa-cog shortcut-icon"></i>
                        <h4>Configurações</h4>
                        <p class="text-muted">Ajustes do sistema</p>
                    </div>
                </div>

                <!-- Suporte -->
                <div class="col-md-4">
                    <div class="shortcut-card" onclick="location.href='suporte.php'">
                        <i class="fas fa-headset shortcut-icon"></i>
                        <h4>Suporte</h4>
                        <p class="text-muted">Ajuda e suporte técnico</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmLogout() {
            // Hide logout modal
            const logoutModal = bootstrap.Modal.getInstance(document.getElementById('logoutModal'));
            logoutModal.hide();
            
            // Show success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            
            // Redirect after delay
            setTimeout(() => {
                window.location.href = 'logout.php';
            }, 1500);
        }

        // Check session status (example)
        function checkSession() {
            // Add your session checking logic here
            // Redirect to login if session is invalid
        }

        // You might want to check session periodically
        setInterval(checkSession, 300000); // Check every 5 minutes
    </script>
</body>
</html>