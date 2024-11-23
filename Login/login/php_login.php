<?php
// Defina variáveis ​​e inicialize com valores vazios
$email = $password          = "";
$email_err = $password_err  = "";
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Verifique se o e-mail está vazio
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Por favor, insira seu e-mail.";
    }
        else
    {
        $email = trim($_POST["email"]);
    }
    // Verifique se a senha está vazia
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Por favor, insira sua senha.";
    }
        else
    {
        $password = trim($_POST["password"]);
    }
    // Validar credenciais
    if(empty($email_err) && empty($password_err))
    {
        // Prepare uma declaração selecionada
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Vincule variáveis ​​à instrução preparada como parâmetros
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Definir parâmetros
            $param_email = $email;
            // Tentativa de executar a instrução preparada
            if(mysqli_stmt_execute($stmt))
            {
                // Armazenar resultado
                mysqli_stmt_store_result($stmt);
                // Verifique se o e-mail existe, se sim, verifique a senha
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    // Vincular variáveis ​​de resultado
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password)){
                            // A senha está correta, então inicie uma nova sessão
                            session_start();
                            // Armazene dados em variáveis ​​de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirecionar usuário para página de welcome.php
                            header("location: welcome.php");
                        }
                        else
                        {
                            // Exibir uma mensagem de erro se a senha não for válida
                            $password_err = "A senha inserida não é válida.";
                        }
                    }
                }
                else
                {
                    // Exibir uma mensagem de erro se o e-mail não existir
                    $email_err = "Nenhuma conta encontrada com esse endereço de e-mail.";
                }
            }
            else
            {
                echo "Eita! Algo não ocorreu como esperado. Por favor, tente novamente mais tarde.";
            }
            // Fechar declaração
            mysqli_stmt_close($stmt);
        }
    }
    // Fechar conexão
    mysqli_close($conection_db);
}