<?php
    include_once "../controller/crud.php";
    $id = $_GET['id'];
    $modelo_o = new administrar();
    $modelo_e = new administrar();
    $datos = $modelo_o->ObtenerDatos_proveedor($id);//este solo trae los datos que seran editados

    //print_r($datos);
    //echo $datos['identificacion'];

    

    echo "<form action='editar.php' method='post'>
    <table>
        <tr>
            <td>Codigo</td>
            <td><input type='text' name='codigo_a' value='".$datos['codigo_a']."'></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre_proveedor' value='".$datos['nombre_proveedor']."'></td>
        </tr>
        <tr>
            <td>cantidad</td>
            <td><input type='text' name='direccion' value='".$datos['direccion']."'></td>
        </tr>
        <tr>
            <td>precio</td>
            <td><input type='text' name='telefono' value='".$datos['telefono']."'></td>
        </tr>
        <tr>
            <td>talla</td>
            <td><input type='text' name='correo' value='".$datos['correo']."'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Editar'></td>
            <td><input type='hidden' name='oculto' value='".$datos['codigo_a']."'></td>
        </tr>
    </table>
</form>";

if(isset($_POST['Submit'])){
    $id = $_POST['oculto'];
    $codigo_a = $_POST['codigo_a'];
    $nombre_proveedor = $_POST['nombre_proveedor'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $resultado = $modelo_e->editar_proveedor($id, $codigo_a, $nombre_proveedor, $direccion, $telefono, $correo);
    
}else{
    echo "no enviado";
}

?>