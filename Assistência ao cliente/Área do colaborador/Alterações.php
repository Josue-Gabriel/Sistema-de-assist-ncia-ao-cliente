<?php
include('Assistência ao cliente/Conexão.php');

if (isset($_POST['alterar_status'])) {
  $atendimento_id = $_POST['atendimento_id'];

  // Lógica para atualizar o status no banco de dados
  // Substitua esta parte com sua própria lógica para atualizar o status

  $novo_status = $_POST['statusAtual'];
  $sql = "UPDATE atendimento SET Status = '$novo_status' WHERE ID = $atendimento_id";
  $dbh->query($sql);

  // Redirecione de volta para a página atual após a atualização
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
