<?php
// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate email
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter a email.";
    }
        else
    {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already taken.";
                }
                    else
                {
                    $email = trim($_POST["email"]);
                }
            }
                else
            {
                echo "Oops! Algo de errado aconteceu. Por favor, tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Por favor, informe a senha.";     
        }
            elseif
            (strlen(trim($_POST["password"])) < 6)
        {
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    }
        else
    {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Por favor, confirme a senha.";     
    }
        else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "A senha não confere.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conection_db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
                header("location: mp-principal.php");
            } 
                else
            {
                echo "Algo de errado aconteceu. Por favor, tente novamente mais tarde.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($conection_db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 400px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="text-center mb-4">Cadastro de Usuário</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="gender">Gênero</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Selecione o gênero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="login.php" class="btn btn-link">Voltar</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Adicione aqui o código JavaScript necessário, se houver
        });
    </script>
</body>
</html>

<?php
// Código PHP já fornecido anteriormente
?>