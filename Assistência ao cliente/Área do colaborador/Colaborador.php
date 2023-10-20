<?php
session_start();
if ($_SESSION['acesso'] == true) {
  echo "";
}
if ($_SESSION['acesso'] == NULL){
  header('Location: Login_colaborador.php');
}
 include('Assistência ao cliente/Conexão.php');

 echo "<form method='post' enctype='multipart/form-data'>";
   echo "<div class=voltar>";
     echo "<button name='voltar' id='voltar'> Voltar </button>";
   echo "</div><br>";
 echo "</form>";

 if(isset($_POST['voltar'])){
   session_destroy();
   header("Location: Login_colaborador.php");
 }

 $stat = $dbh->prepare("select *from atendimento");
 $stat->execute();

while($row = $stat->fetch()) {
 echo "<div class='informaçoees'>";
    echo "Título: " . $row['Título'] . "<br><br>";
    echo "DESCRIÇÃO: " . $row['Descrição'] . "<br><br>";
    echo "STATUS: " . $row['Status'];

    echo "<form action='Alterações.php' method='post'>";
      echo "<input type='hidden' name='atendimento_id' value='" . $row['id'] . "'>";
      echo "<select name='statusAtual'>";
        echo "<option value='Aberto'>Aberto</option>";
        echo "<option value='Atendendo'>Atendendo</option>";
        echo "<option value='Finalizado'>Finalizado</option>";
      echo "</select>";
      echo "<button type='submit' name='alterar_status' id='alterar'>Alterar status</button>";
    echo "</form>";

 echo "</div><br>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet">
    <meta charset="utf-8">
    <title>Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous">
    <script type="text/javascript" src="configurações.js"></script>
    <style>
    #voltar{
      border: solid;
      border-radius: 10px;
      width: 130px;
      background-color: purple;
      height: 40px;
      position: fixed;
    }

    .informaçoees{
      color: white;
      border: solid;
      padding: 20px;
      background-color: rgba(100, 0, 255, 0.25);
    }
    body{
      background-color: black;
    }
    @media screen and (max-width: 1068px){
      #pesquisar{
        font-size: 100%;
      }
    }
    </style>
  </head>
  <body>
  </body>
</html>
