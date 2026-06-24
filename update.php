<?php

include "conecta.php";

$id = $_POST['id'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];

$sql = "UPDATE loja
  SET nm_cor = :cor,
    sg_tamanho = :tamanho
  WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':cor', $cor);
$stmt->bindParam(':tamanho', $tamanho);
$stmt->bindParam(':id', $id);

$stmt->execute();

include "consulta2.php";
inserir();

?>
