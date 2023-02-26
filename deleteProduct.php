<?php
include '../CRUD/Model.php';
$id = $_GET['id'];
$model = new Model();
$model->deleteProduct($id);
header("Location: ../pages/dashboard.php");
exit;
?>