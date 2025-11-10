<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_clientes WHERE id_cliente=$id");
$row = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  $sql = "UPDATE tb_clientes SET nome='$nome', telefone='$telefone', email='$email' WHERE id_cliente=$id";
  $conn->query($sql);
  header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Editar Cliente</h2>
<form method="POST">
  <input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control mb-2" required>
  <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>" class="form-control mb-2">
  <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control mb-2">
  <button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
  <a href="listar.php" class="btn btn-secondary">Cancelar</a>
</form>

</body>
</html>
