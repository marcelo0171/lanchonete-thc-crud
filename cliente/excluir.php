<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM tb_clientes WHERE id_cliente=$id");
header("Location: listar.php");
?>
