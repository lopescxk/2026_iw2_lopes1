<?php

function inserir(){
include "conecta.php";

$stmt = $conn->query("SELECT * FROM loja");

$resposta = "<table class='table table-striped table-bordered table-hover minha-tabela'>
<thead class='cima'>
<tr> 
<th>N°</th>
<th>Cor</th>
<th>Tamanho</th>
<th class='personalizar'>Personalizar</th>
</tr>
</thead> <tbody class='table-group-divider baixo'>";

while($user = $stmt->fetchObject()) {
    $resposta .= "
    <tr>
    <td>$user->id</td>
    <td>$user->nm_cor</td>
    <td>$user->sg_tamanho</td>
    <td><button class= 'btn b2 btn-sm excluir' id='$user->id'>Excluir</button>
    <button class= 'btn b3 btn-sm editar' id='$user->id' data-bs-toggle='modal' data-bs-target='#ModalEdit'>Editar</button></td> 
    </tr>";
}
 $resposta.="<tbody> </table>";
echo $resposta;


}
?>