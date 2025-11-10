<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_produtos WHERE id_produto=$id");
$row = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {
  $nome = $_POST['nome_produto'];
  $preco = $_POST['preco'];
  $categoria = $_POST['categoria'];

  $sql = "UPDATE tb_produtos SET nome_produto='$nome', preco='$preco', categoria='$categoria' WHERE id_produto=$id";
  $conn->query($sql);
  header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Produto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Editar Produto</h2>
<form method="POST">
  <input type="text" name="nome_produto" value="<?php echo $row['nome_produto']; ?>" class="form-control mb-2" required>
  <input type="number" step="0.01" name="preco" value="<?php echo $row['preco']; ?>" class="form-control mb-2">
  <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" class="form-control mb-2">
  <button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
  <a href="listar.php" class="btn btn-secondary">Cancelar</a>
</form>

</body>
</html>
