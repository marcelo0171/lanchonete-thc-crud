<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_pedidos WHERE id_pedido=$id");
$pedido = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {
  $id_cliente = $_POST['id_cliente'];
  $id_produto = $_POST['id_produto'];
  $quantidade = $_POST['quantidade'];

  $sql = "UPDATE tb_pedidos SET id_cliente='$id_cliente', id_produto='$id_produto', quantidade='$quantidade' WHERE id_pedido=$id";
  $conn->query($sql);
  header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Pedido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Editar Pedido</h2>
<form method="POST">

  <label>Cliente:</label>
  <select name="id_cliente" class="form-select mb-2">
    <?php
    $clientes = $conn->query("SELECT * FROM tb_clientes");
    while ($c = $clientes->fetch_assoc()) {
      $sel = ($c['id_cliente'] == $pedido['id_cliente']) ? 'selected' : '';
      echo "<option value='{$c['id_cliente']}' $sel>{$c['nome']}</option>";
    }
    ?>
  </select>

  <label>Produto:</label>
  <select name="id_produto" class="form-select mb-2">
    <?php
    $produtos = $conn->query("SELECT * FROM tb_produtos");
    while ($p = $produtos->fetch_assoc()) {
      $sel = ($p['id_produto'] == $pedido['id_produto']) ? 'selected' : '';
      echo "<option value='{$p['id_produto']}' $sel>{$p['nome_produto']}</option>";
    }
    ?>
  </select>

  <input type="number" name="quantidade" value="<?php echo $pedido['quantidade']; ?>" class="form-control mb-2" min="1" required>

  <button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
  <a href="listar.php" class="btn btn-secondary">Cancelar</a>
</form>

</body>
</html>
