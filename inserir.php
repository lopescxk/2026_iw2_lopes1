<?php

include "conecta.php";
include "consulta2.php";


$cor = $_POST['campo1'];
$tamanho = $_POST['campo2'];

$sql = "INSERT INTO loja (nm_cor, sg_tamanho) VALUES ('$cor', '$tamanho')";

if($conn->exec($sql)){
    inserir();
}else {
    echo "Falha ao registrar!";
}

?>