<!DOCTYPE html>
<?php
include("Assistência ao cliente/Conexão.php");

if(isset($_POST['usuario'])){
  $usuario = $_POST['usuario'];
  $query = "SELECT * FROM login_colaborador WHERE usuario = '$usuario'";
  $result = $mysqli->query($query);
  if(strlen($_POST['usuario']) == 0){
    echo "<div class=erro>";
      echo "Por favor preencher o usuario";
    echo "</div>";
  } else if(strlen($_POST['senha']) == 0){
    echo "<div class=erro>";
      echo "Por favor preencher a senha";
    echo "</div>";
  } else if(strlen($_POST['nome_completo']) == 0){
    echo "<div class=erro>";
      echo "Por favor preencher o nome";
    echo "</div>";
  } else if($result->num_rows > 0){
    echo "<p id='cadastro_feito'>Usuario já cadastrado!</p>";
  }
  else {
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nome_completo = $_POST['nome_completo'];

    $mysqli->query("INSERT INTO login_colaborador (nome_Completo, usuario, senha) VALUES ('$nome_completo', '$usuario', '$senha')");
  }

}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .Cadastro{
        text-align: center;
      }
      #cadastro_feito{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="Cadastro">
      <h1>Cadastro</h1>
      <form action="" method="post">
        <h5>Nome Completo</h5>
        <input type="text" name="nome_completo">
        <h5>Usuario</h5>
        <input type="text" name="usuario">
        <h5>Senha</h5>
        <input type="password" name="senha"><p>
        <button type="submit">Cadastrar</button>
      </form>
    </div>
  </body>
</html>
