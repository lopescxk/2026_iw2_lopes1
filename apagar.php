<?php

include "conecta.php";
include "consulta2.php";

$id = $_POST['id'];
$sql = "DELETE FROM loja WHERE id = '$id'";
$conn->exec($sql);
inserir();

?>