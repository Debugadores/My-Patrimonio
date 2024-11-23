<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";
// Headers de segurança
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Content-Security-Policy: default-src 'self' https://cdnjs.cloudflare.com https://code.jquery.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com; img-src 'self' data:;");

// Inicializar variáveis
$usuario = $password = $empresaCodigo = "";
$usuario_err = $password_err = $empresaCodigo_err = "";

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar código da empresa
    if (empty(trim($_POST["empresaCodigo"]))) {
        $empresaCodigo_err = "Por favor, insira o código da empresa.";
    } else {
        $empresaCodigo = trim($_POST["empresaCodigo"]);
    }

    // Validar usuário
    if (empty(trim($_POST["usuario"]))) {
        $usuario_err = "Por favor, insira o usuário.";
    } else {
        $usuario = trim($_POST["usuario"]);
    }

    // Validar senha
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira sua senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Continuar validação se não houver erros
    if (empty($empresaCodigo_err) && empty($usuario_err) && empty($password_err)) {
        // Verificar o código da empresa
        $sql_empresa = "SELECT codigo FROM empresas WHERE codigo = ?";
        if ($stmt_empresa = mysqli_prepare($conection_db, $sql_empresa)) {
            mysqli_stmt_bind_param($stmt_empresa, "s", $param_empresaCodigo);
            $param_empresaCodigo = $empresaCodigo;

            if (mysqli_stmt_execute($stmt_empresa)) {
                mysqli_stmt_store_result($stmt_empresa);

                if (mysqli_stmt_num_rows($stmt_empresa) == 1) {
                    // Código da empresa válido, verificar usuário e senha
                    $sql_user = "SELECT id, usuario, password FROM users WHERE usuario = ?";
                    if ($stmt_user = mysqli_prepare($conection_db, $sql_user)) {
                        mysqli_stmt_bind_param($stmt_user, "s", $param_usuario);
                        $param_usuario = $usuario;

                        if (mysqli_stmt_execute($stmt_user)) {
                            mysqli_stmt_store_result($stmt_user);

                            if (mysqli_stmt_num_rows($stmt_user) == 1) {
                                // Verificar senha
                                mysqli_stmt_bind_result($stmt_user, $id, $usuario, $hashed_password);
                                if (mysqli_stmt_fetch($stmt_user)) {
                                    if (password_verify($password, $hashed_password)) {
                                        // Login bem-sucedido
                                        session_start();
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["usuario"] = $usuario;

                                        // Redirecionar para a página principal
                                        header("location: Principal/package/src/html/index.php");
                                        exit;
                                    } else {
                                        $password_err = "A senha inserida não é válida.";
                                    }
                                }
                            } else {
                                $usuario_err = "Nenhuma conta encontrada com esse usuário.";
                            }
                        }
                    }
                } else {
                    $empresaCodigo_err = "Código da empresa inválido.";
                }
            }
            mysqli_stmt_close($stmt_empresa);
        }
    }

    // Fechar conexão
    mysqli_close($conection_db);
}
?>
