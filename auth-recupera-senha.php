<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPatrimonio | Recuperar Senha</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/auth-login.css">
    <link rel="icon" type="image/x-icon" href="login/assets/img/favicon/logo.ico"> 
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

            <h5 class="text-center mb-3" style="color: #0a2463;">RECUPERAÇÃO DE SENHA</h5>

            <p class="info-text">Para recuperar sua senha, informe os dados abaixo e siga as instruções que serão enviadas ao seu e-mail.</p>

            <form id="recoveryForm">
                <div class="mb-4">
                    <label class="form-label">USUÁRIO</label>
                    <input type="text" class="form-control" placeholder="Digite seu nome de usuário" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">E-MAIL</label>
                    <input type="email" class="form-control" placeholder="Digite seu e-mail cadastrado" required>
                </div>

                <ul class="recovery-steps">
                    <li style="color: #0a2463;">Um código de verificação será enviado para seu e-mail</li>
                    <li style="color: #0a2463;">Digite o código recebido para validar sua identidade</li>
                    <li style="color: #0a2463;">Defina sua nova senha</li>
                </ul>

                <div class="buttons-group">
                    <button type="submit" class="btn btn-primary">Recuperar Senha</button>
                </div>

                <div class="forgot-password mt-3">
                    <a href="auth-login.php">Voltar para o login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('recoveryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            // Desabilitar botão e mostrar loading
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
            
            // Simular requisição
            setTimeout(() => {
                alert('Solicitação de recuperação enviada. Verifique seu e-mail.');
                
                // Restaurar botão
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            }, 1500);
        });
    </script>
</body>
</html>