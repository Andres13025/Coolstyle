<?php
    include_once "../controller/crud.php";
    $id = $_GET['id'];
    $modelo_q = new administrar();
    $resultado = $modelo_q->quitar($id);
?>