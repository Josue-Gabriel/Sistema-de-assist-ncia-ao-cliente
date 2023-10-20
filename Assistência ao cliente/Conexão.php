<?php
  $usuario = ''; //Usuário de acesso ao banco de dados.
  $senha = ''; //Senha de acesso ao banco de dados.
  $database = 'atendimento';
  $host = ''; //Host do banco de dados.

  $mysqli = new mysqli($host, $usuario, $senha, $database);

  $dbh = new PDO("mysql: host=localhost ;dbname=atendimento", "Usuario de acesso ao banco de dados", "Senha de acesso ao banco de dados");
  if($dbh && $mysqli == false){
    die("Falha na conexão com o banco de dados :");
  }

?>
