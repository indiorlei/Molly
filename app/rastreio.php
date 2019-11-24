<?php
require('../config.php');

$codRastreio = $_POST['codRastreio'];
$codRastreio = trim($codRastreio);

if (!$codRastreio) {
    echo 'Digite o Código de Rastreio';
    return false;
}

$pdo = dbConnect();
$statement = $pdo->prepare(
    "select
    s.nome as status,
    p.dataCriacao,
    p.dataModificacao

    from pedidos p
    inner join status s on s.id = p.status

    where p.codRastreio = :codRastreio order by datamodificacao desc;"
);

$statement->execute(array(':codRastreio' => $codRastreio));
$statusRastreio = $statement->fetchAll(PDO::FETCH_OBJ);

$result = '';

if ($statusRastreio) {
    $statusRastreio = $statusRastreio[0];
    $result = 'Status: ' . $statusRastreio->status . '<br>Data alteração do Status: ' . date('d/m/Y H:i:s', strtotime($statusRastreio->dataModificacao));
} else {
    $result = 'Pedido Não encontrado';
}

echo $result;
