<?php
    include_once "../controller/crud.php";
    $id = $_GET['id'];
    $modelo_e = new administrar();
    $resultado = $modelo_e->eliminar_pedido($id);
?>