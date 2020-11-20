<?php
    include_once ("crud.php");
    $id = $_GET['id'];
    $modelo_e = new administrar();
    $resultado = $modelo_e->eliminar($id);
?>