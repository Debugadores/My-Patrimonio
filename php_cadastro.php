<?php
// Defina variáveis ​​e inicialize com valores vazios
$email = $password = $confirm_password = $usuario = $nome = "";
$email_err = $password_err = $confirm_password_err = $usuario_err = $nome_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nome completo
    if (empty(trim($_POST["nome"]))) {
        $nome_err = "Por favor, insira seu nome completo.";
    } elseif (strlen(trim($_POST["nome"])) < 3) {
        $nome_err = "O nome deve ter pelo menos 3 caracteres.";
    } else {
        $nome = trim($_POST["nome"]);
    }

    // Validar email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor, insira um endereço de e-mail.";
    } else {
        // Prepare uma declaração selecionada
        $sql = "SELECT codigo FROM usuarios WHERE email = ?";

        if ($stmt = mysqli_prepare($conection_db, $sql)) {
            // Vincule variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Definir parâmetros
            $param_email = trim($_POST["email"]);

            // Tentativa de executar a instrução preparada
            if (mysqli_stmt_execute($stmt)) {
                // Armazenar resultado
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "O email inserido já está em uso.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Eita! Algo não ocorreu como esperado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            mysqli_stmt_close($stmt);
        }
    }

    // Validar senha
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira uma senha.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar confirmar senha
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor, confirme a senha.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "A senha não corresponde.";
        }
    }

    // Validar nome de usuário
    // if (empty(trim($_POST["usuario"]))) {
    //    $usuario_err = "Por favor, insira um nome de usuário.";
    //} else {
    //    $usuario = trim($_POST["usuario"]);
    //}

    // Validar nome de usuário
if (empty(trim($_POST["usuario"]))) {
    $usuario_err = "Por favor, insira um nome de usuário.";
} else {
    // Prepare uma declaração selecionada
    $sql = "SELECT codigo FROM usuarios WHERE usuario = ?";
    
    if ($stmt = mysqli_prepare($conection_db, $sql)) {
        // Vincule variáveis à instrução preparada como parâmetros
        mysqli_stmt_bind_param($stmt, "s", $param_usuario);
        
        // Definir parâmetros
        $param_usuario = trim($_POST["usuario"]);
        
        // Tentativa de executar a instrução preparada
        if (mysqli_stmt_execute($stmt)) {
            // Armazenar resultado
            mysqli_stmt_store_result($stmt);
            
            if (mysqli_stmt_num_rows($stmt) == 1) {
                $usuario_err = "Este nome de usuário já está em uso.";
            } else {
                $usuario = trim($_POST["usuario"]);
            }
        } else {
            echo "Eita! Algo não ocorreu como esperado. Por favor, tente novamente mais tarde.";
        }
    }
}

    // Verifique os erros de entrada antes de inserir no banco de dados
    if (empty($nome_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)
        && empty($usuario_err)) {

        // Prepare uma instrução de inserção
        $sql = "INSERT INTO usuarios (nome, email, senha, usuario) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conection_db, $sql)) {
            // Vincule variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "ssss", $param_nome, $param_email, $param_password, $param_usuario);

            // Definir parâmetros
            $param_nome = $nome;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_usuario = $usuario;

            // Tentativa de executar a instrução preparada
            if (mysqli_stmt_execute($stmt)) {
                // Redirecionar para página de login
                header("location: auth-login.php");
            } else {
                echo "Eita! Algo não ocorreu como esperado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            mysqli_stmt_close($stmt);
        }
    }
    // Fechar conexão
    mysqli_close($conection_db);
}
?>
