<?php
    include_once "../controller/crud.php";
    $modelo_a = new administrar();

    echo "<form action='agregar.php' method='post'>
    <table>
        <tr>
            <td>Nombre_proveedor</td>
            <td><input type='text' name='nombre_proveedor'></td>
        </tr>
        <tr>
            <td>direccion</td>
            <td><input type='text' name='direccion'></td>
        </tr>
        <tr>
            <td>telefono</td>
            <td><input type='text' name='telefono'></td>
        </tr>
        <tr>
            <td>correo</td>
            <td><input type='text' name='correo'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Agregar'></td>
        </tr>
    </table>
</form>";

    if(isset($_POST['Submit'])){
        $nombre_proveedor = $_POST['nombre_proveedor'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $resultado = $modelo_a->agregar_proveedor($nombre_proveedor, $direccion, $telefono, $correo);
        
    }else{
        
    }

?>
