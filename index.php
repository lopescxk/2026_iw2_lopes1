<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
</head>
<script>
    
$(document).ready(function(){
    let cor = "";
    let tamanho = "";
    let idEdit = "";

    $('#camisetas').change(function(){
        cor = $(this).val();
    })
    $('#tamanho').change(function(){
       tamanho = $(this).val();
    })

    $(".b").click(function(){
    $.ajax ({
    url: "inserir.php",
    type: "POST",
    data: "campo1=" + cor + "&campo2=" + tamanho,
    dataType: "html"
}).done(function(resposta){
    $(".mandar").html(resposta);
}).fail(function(jqXHR,textStatus){
    console.log("Request failed: " + textStatus);
}) 
  }) 

$('.mandar').on("click", ".excluir", function(){
  let id =$(this).attr("id")
    $.ajax ({
    url: "apagar.php",
    type: "POST",
    data: { id:
    id },
    dataType: "html"
}).done(function(resposta){
    $(".mandar").html(resposta);
}).fail(function(jqXHR,textStatus){
    console.log("Request failed: " + textStatus);
})
  })


$(document).on("click", ".editar", function(){
  idEdit =$(this).attr("id")
    $.ajax ({
    url: "consulta-edit.php",
    type: "POST",
    data: { id:
    idEdit },
    dataType: "json"
}).done(function(resposta){
  $("#camisetas_edit").val(resposta.cor);;
  $("#tamanho_edit").val(resposta.tamanho);

  $("#ModalEdit").modal("show");
}).fail(function(jqXHR,textStatus){
    console.log("Request failed: " + textStatus);
})
  })  
$(document).on("click", ".b-edit", function(){

 let corEdit = $("#camisetas_edit").val();
 let tamanhoEdit = $("#tamanho_edit").val();
 $.ajax({
     url: "update.php",
     type: "POST",
     data: {
         id: idEdit,
         cor: corEdit,
         tamanho: tamanhoEdit
     },
     dataType: "html"
 }).done(function(resposta){
     $(".mandar").html(resposta);
 }).fail(function(jqXHR,textStatus){
     console.log("Request failed: " + textStatus);
 });
}); 
    })
</script>

<body>
    
<!-- Button to Open the Modal -->
<button type="button" class="btn primeiro-b" data-bs-toggle="modal" data-bs-target="#myModal">
  Enviar Pedido
</button>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header m-fundo1">
        <h4 class="modal-title">Formulário de compra</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body m-fundo2">

    <label for="camisetas" class="text">Cor:</label> <br> <br>
    <select name="camisetas" id="camisetas">
        <option value="" disabled selected hidden>Camiseta</option>
        <option value="roxo">Roxo</option>
        <option value="azul">Azul</option>
        <option value="verde">Verde</option>
        <option value="preto">Preto</option>
        <option value="branco">Branco</option> </select>
        <br><br>

    <label for="tamanho" class="text">Tamanho:</label> <br> <br>
    <select name="tamanho" id="tamanho">
        <option value="" disabled selected hidden>Tamanhos</option>
        <option value="pp">PP</option>
        <option value="p">P</option>
        <option value="m">M</option>
        <option value="g">G</option>
        <option value="gg">GG</option>
    </select>
    <br><br>
    <button type="button"  class="b">Enviar</button>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer m-fundo1">
        <button type="button" class="bf" data-bs-dismiss="modal">Finalizar pedido</button>
      </div>
     </div>
   </div>
 </div>







 
<!-- The Modal -->
<div class="modal" id="ModalEdit">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header  m-fundo1">
        <h4 class="modal-title">Editar formulário de Compra</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body  m-fundo2">

    <label for="camisetas">Troque a cor da sua camiseta:</label> <br> <br>
    <select name="camisetas" id="camisetas_edit">
        <option value="" disabled selected hidden>Camiseta</option>
        <option value="roxo">Roxo</option>
        <option value="azul">Azul</option>
        <option value="verde">Verde</option>
        <option value="preto">Preto</option>
        <option value="branco">Branco</option> </select>
        <br><br>

    <label for="tamanho">Troque o tamanho da sua camiseta:</label> <br> <br>
    <select name="tamanho" id="tamanho_edit">
        <option value="" disabled selected hidden>Tamanhos</option>
        <option value="pp">PP</option>
        <option value="p">P</option>
        <option value="m">M</option>
        <option value="g">G</option>
        <option value="gg">GG</option>
    </select>
    <br><br>
    <button class="b-edit">Enviar</button>
    <br><br>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer m-fundo1">
        <button type="button" class="btn btn1" data-bs-dismiss="modal">Finalizar Compra</button>
      </div>

     </div>
   </div>
 </div>

<br> <br>

<!-- The Modal -->


<div class="mandar">

<?php

include "consulta2.php";
inserir();

?>
</div>

</body>
</html>