<?php
// Defina variáveis ​​e inicialize com valores vazios
$email = $password = $confirm_password = $usuario = $telefone = $genero = $nome = "";
$email_err = $password_err = $confirm_password_err = $usuario_err = $telefone_err = $genero_err = $nome_err = "";

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
        $sql = "SELECT id FROM users WHERE email = ?";

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
    } elseif (strlen(trim($_POST["password"])) < 3) {
        $password_err = "A senha deve ter pelo menos 3 caracteres.";
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
    if (empty(trim($_POST["usuario"]))) {
        $usuario_err = "Por favor, insira um nome de usuário.";
    } else {
        $usuario = trim($_POST["usuario"]);
    }

    // Validar telefone
    if (empty(trim($_POST["telefone"]))) {
        $telefone_err = "Por favor, insira um telefone.";
    } elseif (!preg_match('/^\d{10,15}$/', trim($_POST["telefone"]))) {
        $telefone_err = "Número de telefone inválido.";
    } else {
        $telefone = trim($_POST["telefone"]);
    }

    // Validar gênero
    if (empty(trim($_POST["genero"]))) {
        $genero_err = "Selecione um gênero.";
    } else {
        $genero = trim($_POST["genero"]);
    }

    // Verifique os erros de entrada antes de inserir no banco de dados
    if (empty($nome_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)
        && empty($usuario_err) && empty($telefone_err) && empty($genero_err)) {

        // Prepare uma instrução de inserção
        $sql = "INSERT INTO users (nome, email, password, usuario, telefone, genero) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conection_db, $sql)) {
            // Vincule variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "ssssss", $param_nome, $param_email, $param_password, $param_usuario, $param_telefone, $param_genero);

            // Definir parâmetros
            $param_nome = $nome;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_usuario = $usuario;
            $param_telefone = $telefone;
            $param_genero = $genero;

            // Tentativa de executar a instrução preparada
            if (mysqli_stmt_execute($stmt)) {
                // Redirecionar para página de login
                header("location: ../auth-login.php");
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
