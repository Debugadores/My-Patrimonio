<?php
// Inicialize a sessão
session_start();
 
// Desative todas as variáveis ​​de sessão
$_SESSION = array();
 
// Destrua a sessão.
session_destroy();
 
// Redirecionar para página de login
header("location: auth-login.php");
exit;
?>