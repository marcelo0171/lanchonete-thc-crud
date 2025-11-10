<?php include('../conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo Produto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container mt-5">

<h2>Novo Produto</h2>
<form method="POST">
  <input type="text" name="nome_produto" placeholder="Nome do produto" class="form-control mb-2" required>
  <input type="number" step="0.01" name="preco" placeholder="Preço" class="form-control mb-2" required>
  <input type="text" name="categoria" placeholder="Categoria" class="form-control mb-2">
  <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
  <a href="listar.php" class="btn btn-secondary">Voltar</a>
</form>

<?php
if (isset($_POST['salvar'])) {
  $nome = $_POST['nome_produto'];
  $preco = $_POST['preco'];
  $categoria = $_POST['categoria'];

  $sql = "INSERT INTO tb_produtos (nome_produto, preco, categoria)
          VALUES ('$nome', '$preco', '$categoria')";
  $conn->query($sql);
  header("Location: listar.php");
}
?>
</body>
</html>
