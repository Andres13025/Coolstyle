<?php
    include_once "../controller/crud.php";
    $modelo_a = new administrar();

    echo "<form action='agregar_p.php' method='post'>
    <table>
        <tr>
            <td>calle</td>
            <td><input type='text' name='calle'></td>
        </tr>
        <tr>
            <td>ciudad</td>
            <td><input type='text' name='ciudad'></td>
        </tr>
        <tr>
            <td>fecha_p</td>
            <td><input type='date' name='fecha_p'></td>
        </tr>
        <tr>
            <td>marca</td>
            <td><input type='text' name='marca'></td>
        </tr>
        <tr>
            <td>color</td>
            <td><input type='text' name='color'></td>
        </tr>
        <tr>
            <td>carrito</td>
            <td><input type='text' name='carrito'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Agregar'></td>
        </tr>
    </table>
</form>";

    if(isset($_POST['Submit'])){
        $calle = $_POST['calle'];
        $ciudad = $_POST['ciudad'];
        $fecha_p = $_POST['fecha_p'];
        $marca = $_POST['marca'];
        $color = $_POST['color'];
        $carrito = $_POST['carrito'];
        $resultado = $modelo_a->agregar_pedido($calle, $ciudad, $fecha_p, $marca, $color, $carrito);
        
    }else{
        
    }

?>
