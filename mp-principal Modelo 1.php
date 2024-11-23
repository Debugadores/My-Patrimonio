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
        :root {
            --sidebar-width: 250px;
            --topbar-height: 60px;
            --primary-color: #0066cc;
            --secondary-color: #00264d;
        }

        body {
            min-height: 100vh;
            background-color: #f5f6fa;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            padding-top: var(--topbar-height);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
            color: white;
        }

        .sidebar-link i {
            width: 30px;
            font-size: 1.2rem;
        }

        .sidebar-link span {
            margin-left: 10px;
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-link span {
            opacity: 0;
            width: 0;
            display: none;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            padding-top: calc(var(--topbar-height) + 20px);
            transition: margin-left 0.3s;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Topbar Styles */
        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--topbar-height);
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            padding: 0 20px;
            transition: left 0.3s;
            z-index: 999;
        }

        .topbar.expanded {
            left: 70px;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            border-left: 4px solid var(--primary-color);
        }

        .chart-card {
            min-height: 300px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-visible {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0 !important;
            }

            .topbar {
                left: 0 !important;
            }
        }

        /* Custom Charts Styling */
        .chart-container {
            height: 250px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <a href="dashboard.php" class="sidebar-link">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
        <a href="cadastros.php" class="sidebar-link">
            <i class="fas fa-folder-plus"></i>
            <span>Cadastros</span>
        </a>
        <a href="relatorios.php" class="sidebar-link">
            <i class="fas fa-chart-bar"></i>
            <span>Relatórios</span>
        </a>
        <a href="inventario.php" class="sidebar-link">
            <i class="fas fa-boxes"></i>
            <span>Inventário</span>
        </a>
        <a href="usuarios.php" class="sidebar-link">
            <i class="fas fa-users"></i>
            <span>Usuários</span>
        </a>
        <a href="configuracoes.php" class="sidebar-link">
            <i class="fas fa-cog"></i>
            <span>Configurações</span>
        </a>
        <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Sair</span>
        </a>
    </nav>

    <!-- Topbar -->
    <div class="topbar" id="topbar">
        <button class="toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="ms-3">
            <h5 class="mb-0">MyPatrimonio</h5>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Summary Stats -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <h6 class="text-muted mb-2">Total de Itens</h6>
                    <h3 class="mb-0">1,234</h3>
                    <small class="text-success">+5% desde o último mês</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <h6 class="text-muted mb-2">Valor Total</h6>
                    <h3 class="mb-0">R$ 543.2K</h3>
                    <small class="text-success">+2.3% desde o último mês</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <h6 class="text-muted mb-2">Itens Ativos</h6>
                    <h3 class="mb-0">1,180</h3>
                    <small class="text-danger">-1% desde o último mês</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <h6 class="text-muted mb-2">Manutenções</h6>
                    <h3 class="mb-0">54</h3>
                    <small class="text-warning">Pendentes</small>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row g-3 mb-4">
            <div class="col-md-8">
                <div class="dashboard-card chart-card">
                    <h5 class="mb-4">Evolução do Patrimônio</h5>
                    <div class="chart-container" id="patrimonioChart"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card chart-card">
                    <h5 class="mb-4">Distribuição por Categoria</h5>
                    <div class="chart-container" id="categoriaChart"></div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="dashboard-card">
            <h5 class="mb-4">Atividades Recentes</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Usuário</th>
                            <th>Ação</th>
                            <th>Item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>18/11/2024</td>
                            <td>João Silva</td>
                            <td>Cadastrou</td>
                            <td>Notebook Dell XPS</td>
                        </tr>
                        <tr>
                            <td>17/11/2024</td>
                            <td>Maria Santos</td>
                            <td>Atualizou</td>
                            <td>Impressora HP</td>
                        </tr>
                        <tr>
                            <td>17/11/2024</td>
                            <td>Carlos Lima</td>
                            <td>Removeu</td>
                            <td>Monitor LG</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Confirmar Saída</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente sair do sistema?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="logout()">Sair</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const topbar = document.getElementById('topbar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleSidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            topbar.classList.toggle('expanded');
            mainContent.classList.toggle('expanded');

            // For mobile
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('mobile-visible');
            }
        });

        // Responsive handling
        window.addEventListener('resize', () => {
            if (window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
                topbar.classList.add('expanded');
                mainContent.classList.add('expanded');
            }
        });

        // Charts
        // Patrimônio Evolution Chart
        const patrimonioCtx = document.createElement('canvas');
        document.getElementById('patrimonioChart').appendChild(patrimonioCtx);
        new Chart(patrimonioCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Valor Total (R$ mil)',
                    data: [450, 475, 480, 500, 520, 543],
                    borderColor: '#0066cc',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Categoria Distribution Chart
        const categoriaCtx = document.createElement('canvas');
        document.getElementById('categoriaChart').appendChild(categoriaCtx);
        new Chart(categoriaCtx, {
            type: 'doughnut',
            data: {
                labels: ['Equipamentos', 'Móveis', 'Veículos', 'Outros'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#0066cc', '#00264d', '#3399ff', '#99ccff']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Logout function
        function logout() {
            window.location.href = 'logout.php';
        }

        // Session check
        function checkSession() {
            // Add your session checking logic here
        }

        setInterval(checkSession, 300000);
    </script>
</body>
</html>