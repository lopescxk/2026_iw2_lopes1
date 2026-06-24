<?php

include "conecta.php";

$stmt = $conn->query("SELECT * FROM loja");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['nm_cor'] . $row['sg_tamanho'] . "<br>";
}

?>