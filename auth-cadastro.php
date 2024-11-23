<?php
    // Incluir arquivo de configuração
    require_once 'config.php';
    // Incluir arquivo de registro
    include 'php_cadastro.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPatrimonio | Cadastro</title>
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

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 

            <!-- Campo Nome -->
            <div class="mb-1">
            <label class="form-label">NOME COMPLETO</label>
            <div class="row g-2">
                <div class="col-5 col-sm-12">
                    <span class="help-block text-danger"><?= $nome_err; ?></span>
                    <div class="input-group <?= (!empty($nome_err)) ? 'has-error' : ''; ?>">
                        <input type="text" 
                            name="nome" 
                            class="form-control" 
                            id="nome" 
                            placeholder="Insira seu nome e sobrenome..." 
                            value="<?= $nome; ?>"
                            required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campo Usuário -->
            <div class="mb-1">
                <label class="form-label">USUÁRIO</label>
                <div class="row g-2">
                    <div class="col-5 col-sm-12">
                        <span class="help-block text-danger"><?= $usuario_err; ?></span>
                        <div class="input-group <?= (!empty($usuario_err)) ? 'has-error' : ''; ?>">
                            <input type="text" 
                                name="usuario" 
                                class="form-control" 
                                id="usuario" 
                                placeholder="Informe um nome de usuário..." 
                                value="<?= $usuario; ?>"
                                required>
                        </div>                       
                    </div>
                </div>
            </div>

            <!-- Campo Email -->
            <div class="mb-1">
                <label class="form-label">EMAIL</label>
                <div class="row g-2">
                    <div class="col-5 col-sm-12">
                        <span class="help-block text-danger"><?= $email_err; ?></span>
                        <div class="input-group <?= (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <input type="email" 
                                name="email" 
                                class="form-control" 
                                id="email" 
                                placeholder="Informe seu email..." 
                                value="<?= $email; ?>"
                                required>
                        </div>                       
                    </div>
                </div>
            </div>

            <!-- Campo Senha --> 
            <div class="mb-1 <?= (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="form-label">SENHA</label>
                <div style="position: relative">
        <input type="password" name="password" class="form-control" id="password1" placeholder="Informe sua senha..." required>
        <button type="button" class="password-toggle" id="passwordToggle1">
            <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
                <span class="help-block text-danger"><?= $password_err; ?></span>
            </div>

            <!-- Campo Confirmar Senha --> 
            <div class="mb-1 <?= (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label class="form-label">CONFIRMAR SENHA</label>
                <div style="position: relative">
        <input type="password" name="confirm_password" class="form-control" id="password2" placeholder="Confirme sua senha..." required>
        <button type="button" class="password-toggle" id="passwordToggle2">
            <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
                <span class="help-block text-danger"><?= $confirm_password_err; ?></span>
            </div>

            <!-- Campo Telefone -->
            <div class="mb-1">
                <label class="form-label">TELEFONE</label>
                <div class="row g-2">
                    <div class="col-5 col-sm-12">
                        <span class="help-block text-danger"><?= $telefone_err; ?></span>
                        <div class="input-group <?= (!empty($telefone_err)) ? 'has-error' : ''; ?>">
                            <input type="text" 
                                name="telefone" 
                                class="form-control" 
                                id="telefone" 
                                placeholder="Informe seu telefone..." 
                                value="<?= $telefone; ?>"
                                required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campo Genero -->
            <div class="mb-1">
                <label class="form-label">GÊNERO</label>
                <div class="row g-2">
                    <div class="col-5 col-sm-12">
                        <span class="help-block text-danger"><?= $genero_err; ?></span>
                        <div class="input-group <?= (!empty($genero_err)) ? 'has-error' : ''; ?>">
                            <select class="form-control" 
                                    id="genero" 
                                    name="genero" 
                                    required>
                                <option value="">Selecione o gênero...</option>
                                <option value="Masculino" <?= ($genero == "Masculino") ? "selected" : ""; ?>>Masculino</option>
                                <option value="Feminino" <?= ($genero == "Feminino") ? "selected" : ""; ?>>Feminino</option>
                                <option value="Outro" <?= ($genero == "Outro") ? "selected" : ""; ?>>Outro</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="links">
                <div class="forgot-password">   
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>

                <div class="links">
                <div class="forgot-password">
                    <a class="text-muted">Já possui cadastro?</span></a> <a href="auth-login.php">Acesse</a>
                </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function setupPasswordToggle(passwordId, toggleId, eyeIconId) {
            const passwordInput = document.getElementById(passwordId);
            const passwordToggle = document.getElementById(toggleId);
            const eyeIcon = document.getElementById(eyeIconId);

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
        }

        // Configurar ambos os campos de senha
        setupPasswordToggle('password1', 'passwordToggle1', 'eyeIcon1');
        setupPasswordToggle('password2', 'passwordToggle2', 'eyeIcon2');
    </script>

</body>
</html>