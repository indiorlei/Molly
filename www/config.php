<?php
session_start();

// constantes com dados de acesso ao MySQL
define('DB_HOST', 'mysql');
// define('USUARIO', $_ENV['MYSQL_USER']); // usuario configurado no Docker
define('DB_USER', 'root');
// define('SENHA', $_ENV['MYSQL_PASS'); // senha configurada no Docker
define('DB_PASS', '123.456');
define('DB_NAME', 'molly');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

// mysqli
// $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ('Não foi possível conectar com o banco de dados');

//PDO
function dbConnect() {
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    return $PDO;
}