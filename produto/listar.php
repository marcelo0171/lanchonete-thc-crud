<?php include('../conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Produtos</h2>
<a href="criar.php" class="btn btn-success mb-3">+ Novo Produto</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Preço</th>
      <th>Categoria</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tb_produtos";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['id_produto']}</td>
              <td>{$row['nome_produto']}</td>
              <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
              <td>{$row['categoria']}</td>
              <td>
                <a href='editar.php?id={$row['id_produto']}' class='btn btn-warning btn-sm'>Editar</a>
                <a href='excluir.php?id={$row['id_produto']}' class='btn btn-danger btn-sm'>Excluir</a>
              </td>
            </tr>";
    }
    ?>
  </tbody>
</table>

<a href="../index.php" class="btn btn-secondary mt-3">Voltar</a>

</body>
</html>
