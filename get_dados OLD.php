<?php
require_once "config.php";

// Buscar razão social da empresa
if(isset($_GET['empresaCodigo'])) {
    $codigo = trim($_GET['empresaCodigo']);
    
    $sql = "SELECT razaosocial FROM empresas WHERE codigo = ?";
    if($stmt = mysqli_prepare($conection_db, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $codigo);
        
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                echo $row['razaosocial'];
            }
        }
        mysqli_stmt_close($stmt);
    }
}

// Buscar nome do usuário
if(isset($_GET['usuario'])) {
    $usuario = trim($_GET['usuario']);
    
    $sql = "SELECT usuario FROM users WHERE id = ?";
    if($stmt = mysqli_prepare($conection_db, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                echo $row['usuario'];
            }
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conection_db);
?>