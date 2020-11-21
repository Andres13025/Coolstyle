<?php
    include_once "../controller/crud.php";
    $id = $_GET['id'];
    $modelo_o = new administrar();
    $modelo_e = new administrar();
    $datos = $modelo_o->ObtenerDatos($id);//este solo trae los datos que seran editados

    //print_r($datos);
    //echo $datos['identificacion'];

    

    echo "<form action='editar.php' method='post'>
    <table>
        <tr>
            <td>Codigo</td>
            <td><input type='text' name='codigo' value='".$datos['codigo_pr']."'></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' value='".$datos['nombre_producto']."'></td>
        </tr>
        <tr>
            <td>cantidad</td>
            <td><input type='text' name='cantidad' value='".$datos['cantidad']."'></td>
        </tr>
        <tr>
            <td>precio</td>
            <td><input type='text' name='precio' value='".$datos['precio']."'></td>
        </tr>
        <tr>
            <td>talla</td>
            <td><input type='text' name='talla' value='".$datos['talla']."'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Editar'></td>
            <td><input type='hidden' name='oculto' value='".$datos['codigo_pr']."'></td>
        </tr>
    </table>
</form>";

if(isset($_POST['Submit'])){
    $id = $_POST['oculto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $talla = $_POST['talla'];
    $resultado = $modelo_e->editar($id, $codigo, $nombre, $cantidad, $precio, $talla);
    
}else{
    echo "no enviado";
}

?>