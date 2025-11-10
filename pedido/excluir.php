<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM tb_pedidos WHERE id_pedido=$id");
header("Location: listar.php");
?>
