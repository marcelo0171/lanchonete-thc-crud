<?php include('../conexao.php'); ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM tb_produtos WHERE id_produto=$id");
header("Location: listar.php");
?>
