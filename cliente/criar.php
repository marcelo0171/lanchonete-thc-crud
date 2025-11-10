<?php include('../conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container mt-5">

<h2>Novo Cliente</h2>
<form method="POST">
  <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" required>
  <input type="text" name="telefone" placeholder="Telefone" class="form-control mb-2">
  <input type="email" name="email" placeholder="E-mail" class="form-control mb-2">
  <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
  <a href="listar.php" class="btn btn-secondary">Voltar</a>
</form>

<?php
if (isset($_POST['salvar'])) {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  $sql = "INSERT INTO tb_clientes (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";
  $conn->query($sql);
  header("Location: listar.php");
}
?>
</body>
</html>
