<?php

header('Content-Type: application/json; charset=utf-8');

include "conecta.php";

$id = $_POST['id'];

$stmt = $conn->prepare("SELECT * FROM loja WHERE ID = :id");
$stmt->execute(['id' => $id]);

$loja = $stmt->fetch(PDO::FETCH_ASSOC);
if ($loja) {

echo json_encode([
    'id' => $loja['id'],
    'cor' => $loja['nm_cor'],
    'tamanho' => $loja['sg_tamanho']
]);
exit;
}

echo json_encode(['error' => 'Registro não encontrado']);
?>