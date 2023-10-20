<?php
include('Assistência ao cliente/Conexão.php');
session_start();
if(isset($_POST['usuario']) || isset($_POST['senha'])){

  if(strlen($_POST['usuario']) == 0){
    echo "<div class=erro>";
      echo "Por favor preencher o usuario";
    echo "</div>";
  } else if(strlen($_POST['senha']) == 0){
    echo "<div class=erro>";
      echo "Por favor preencher a senha";
    echo "</div>";
  }else {

    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT *FROM login_cliente WHERE usuario = '$usuario'";
    $sql_query = $mysqli->query($sql_code) or die("Falha no codigo SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){

      $usuario = $sql_query->fetch_assoc();

      if(password_verify($senha, $usuario['senha'])){

        if(!isset($_SESSION['acesso'])){
          $_SESSION['acesso'] = true;
          header("Location: Cliente.php");
        }
        if($_SESSION['acesso'] == true){
          echo "";
        }

        header("Location: Cliente.php");
      }
    } else {
      echo "<div class=erro>";
        echo "Falha ao logar! Usuário e/ou senha incorretos";
      echo "</div>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css">
    <style>
      .Acesso{
        border: solid;
        width: 200px;
        padding: 40px;
        border-radius: 10px;
        background-color: rgba(100, 0, 200, 0.3);
        margin-left: 40%;
        margin-top: 15%;
      }
      #botao{
        margin-left: 65px;
      }
      input{
        margin-left: 13px;
        border-radius: 10px;
      }
      h1{
        margin-left: 50px;
      }
      .erro{
        background-color: rgba(255, 0, 0, 0.5);
        padding: 5px;
        width: 290px;
        margin: 320px 10px 10px 585px;
        position: fixed;
        border-radius: 10px;
        text-align: center;
      }
      #cadastrar{
        margin-left: 60px;
      }
      .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 999;
      }
      .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        color: black;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
      }
      .close-button:hover{
        background-color: #f00;
      }
      @media screen and (max-width: 1068px){
        .Acesso{
          border: solid;
          width: 450px;
          padding: 20px;
          background-color: rgba(100, 0, 200, 0.3);
          border-radius: 10px;
          margin-left: 25%;
          margin-top: 55%;
          font-size: 45px;
        }
        body{
          background-size: 200%, 50%, -200%;
        }
        input{
          font-size: 30px;
        }
        #botao{
          margin-left: 150px;
        }
        h1{
          margin-left: 100px;
          margin-bottom: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="Acesso">
      <form action="" method="post">
        <font face="Arial"> <h1>LOGIN</h1> </font><br>
        <input type="text" placeholder="Usuario" name="usuario"><br><br>
        <input type="password" placeholder="Senha" name ="senha"><br><br>
        <input type="submit" value="Acessar" id="botao"><br>
      </form>
      <input type="submit" onclick="openPopup()" value="Cadastrar" id="cadastrar">
    </div>
    <div class="popup" id="popup">
      <iframe src="Cadastro_cliente.php" width="260px" height="360px"></iframe>
      <button onclick="closePopup()" class="close-button">X</button>
    </div>
    <script type="text/javascript">
      function openPopup() {
        document.getElementById("popup").style.display = "block";
      }

      function closePopup() {
        document.getElementById("popup").style.display = "none";
      }
    </script>
  </body>
</html>
