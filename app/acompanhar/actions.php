<?php
require('../../config.php');
require('../isLoggedIn.php');

$pdo = dbConnect();

if ($_GET['action'] == 'cancel') {
    $ID = isset($_GET['id']) ? $_GET['id'] : '';
    try {
        // status 2 = 'Cancelado'ı
        $statement = $pdo->prepare('update pedidos set status = 2 where id = :id');
        $statement->execute(array(
            ':id' => $ID
        ));

        header('Location: /app/acompanhar/');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
