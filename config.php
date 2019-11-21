<?php
session_start();

if ($_SERVER[HTTP_HOST] == 'localhost') {
    // constantes com dados de acesso ao MySQL
    define('DB_HOST', 'mysql');
    define('DB_USER', 'root');
    define('DB_PASS', '123.456');
    define('DB_NAME', 'molly');
} else {
    define('DB_HOST', 'lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
    define('DB_USER', 'v60er1qb6pnw3naj');
    define('DB_PASS', 't012buheow0r9ado');
    define('DB_NAME', 'uf8dsukgfxv7p7b9');
}




// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

// mysqli
// $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ('Não foi possível conectar com o banco de dados');

//PDO
function dbConnect()
{

    // correto
    // try {
    //     $db = new PDO("mysql:dbname=database;host=localhost;charset=utf8;", "root", "");
    // } catch (PDOException $e) {
    //     throw new PDOException($e);
    // }

    // errado
    // try {
    //     $db = new PDO("mysql:dbname=database;host=localhost;charset=utf8;", "root", "");
    // } catch (PDOException $e) {
    //     $e->getMessage();
    // }



    try {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();

        throw new PDOException($e);
    }
}
