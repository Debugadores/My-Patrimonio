<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário já está logado, se sim, redirecione-o para a página welcome.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: mp-principal.php");
    exit;
}
// Incluir arquivo de configuração
require_once "config.php";
require_once "php_login.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPatrimonio Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/auth-login.css">
</head>
<body>
    <div class="login-card">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        
        <div class="position-relative">
            <div class="logo">
                <svg viewBox="0 0 24 24">
                    <path d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L6.04,7.5L12,10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z" />
                </svg>
                MyPatrimonio
            </div>

            <form id="loginForm" class="needs-validation" novalidate>
                <div class="mb-4">
                    <label class="form-label">EMPRESA</label>
                    <div class="row g-2">
                        <div class="col-4 col-sm-3">
                            <input type="text" class="form-control" id="empresaCodigo" placeholder="Código" required>
                        </div>
                        <div class="col-8 col-sm-9">
                            <input type="text" class="form-control" placeholder="Razão Social" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">USUÁRIO</label>
                    <div class="row g-2">
                        <div class="col-5 col-sm-4">
                            <input type="text" class="form-control" id="usuario" placeholder="Usuário" required>
                        </div>
                        <div class="col-7 col-sm-8">
                            <input type="text" class="form-control" placeholder="Funcionário" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">SENHA</label>
                    <div class="password-container">
                        <input type="password" class="form-control" placeholder="Informe sua senha..." id="password" required>
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <div class="forgot-password">
                        <a href="auth-recupera-senha.html">Esqueceu sua senha?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Acessar
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        const eyeIcon = document.getElementById('eyeIcon');

        passwordToggle.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        });
    </script>
</body>
</html>