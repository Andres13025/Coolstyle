<?php
    include_once ("crud.php");
    $modelo_a = new administrar();

    echo "<form action='agregar.php' method='post'>
    <table>
        <tr>
            <td>Nombre_producto</td>
            <td><input type='text' name='nombre'></td>
        </tr>
        <tr>
            <td>cantidad</td>
            <td><input type='text' name='cantidad'></td>
        </tr>
        <tr>
            <td>precio</td>
            <td><input type='text' name='precio'></td>
        </tr>
        <tr>
            <td>talla</td>
            <td><input type='text' name='talla'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Agregar'></td>
        </tr>
    </table>
</form>";

    if(isset($_POST['Submit'])){
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $talla = $_POST['talla'];
        $resultado = $modelo_a->agregar($nombre, $cantidad, $precio, $talla);
        
    }else{
        
    }

?>
