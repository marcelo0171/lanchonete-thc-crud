<?php include('../conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Pedidos</h2>
<a href="criar.php" class="btn btn-success mb-3">+ Novo Pedido</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Produto</th>
      <th>Quantidade</th>
      <th>Data</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT p.id_pedido, c.nome AS tb_cliente, pr.nome_produto AS tb_produto, p.quantidade, p.data_pedido
            FROM tb_pedidos p
            JOIN tb_clientes c ON p.id_cliente = c.id_cliente
            JOIN tb_produtos pr ON p.id_produto = pr.id_produto";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['id_pedido']}</td>
              <td>{$row['tb_cliente']}</td>
              <td>{$row['tb_produto']}</td>
              <td>{$row['quantidade']}</td>
              <td>{$row['data_pedido']}</td>
              <td>
                <a href='editar.php?id={$row['id_pedido']}' class='btn btn-warning btn-sm'>Editar</a>
                <a href='excluir.php?id={$row['id_pedido']}' class='btn btn-danger btn-sm'>Excluir</a>
              </td>
            </tr>";
    }
    ?>
  </tbody>
</table>

<a href="../index.php" class="btn btn-secondary mt-3">Voltar</a>

</body>
</html>
