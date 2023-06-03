<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cursophp";

// Criar conexão
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Verificar conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

//echo "Conexão com o banco iniciada com sucesso.";
?>
