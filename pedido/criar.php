<?php include('../conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo Pedido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container mt-5">

<h2>Novo Pedido</h2>
<form method="POST">

  <label>Cliente:</label>
  <select name="id_cliente" class="form-select mb-2" required>
    <option value="">Selecione um cliente</option>
    <?php
    $clientes = $conn->query("SELECT * FROM tb_clientes");
    while ($c = $clientes->fetch_assoc()) {
      echo "<option value='{$c['id_cliente']}'>{$c['nome']}</option>";
    }
    ?>
  </select>

  <label>Produto:</label>
  <select name="id_produto" class="form-select mb-2" required>
    <option value="">Selecione um produto</option>
    <?php
    $produtos = $conn->query("SELECT * FROM tb_produtos");
    while ($p = $produtos->fetch_assoc()) {
      echo "<option value='{$p['id_produto']}'>{$p['nome_produto']} - R$ " . number_format($p['preco'], 2, ',', '.') . "</option>";
    }
    ?>
  </select>

  <input type="number" name="quantidade" placeholder="Quantidade" class="form-control mb-2" min="1" required>

  <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
  <a href="listar.php" class="btn btn-secondary">Voltar</a>
</form>

<?php
if (isset($_POST['salvar'])) {
  $id_cliente = $_POST['id_cliente'];
  $id_produto = $_POST['id_produto'];
  $quantidade = $_POST['quantidade'];

  $sql = "INSERT INTO tb_pedidos (id_cliente, id_produto, quantidade)
          VALUES ('$id_cliente', '$id_produto', '$quantidade')";
  $conn->query($sql);
  header("Location: listar.php");
}
?>
</body>
</html>
