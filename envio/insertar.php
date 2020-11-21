<?php
    include_once "../controller/crud.php";
    $modelo_i = new administrar();

    echo "<form action='insertar.php' method='post'>
    <table>
        <tr>
            <td>Fecha envio</td>
            <td><input type='date' name='fecha'></td>
        </tr>
        <tr>
            <td>Metodo envio</td>
            <td><input type='text' name='metodo'></td>
        </tr>
        <tr>
            <td>Codigo producto</td>
            <td><input type='text' name='codigo'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Agregar'></td>
        </tr>
    </table>
</form>";

    if(isset($_POST['Submit'])){
        $fecha = $_POST['fecha'];
        $metodo = $_POST['metodo'];
        $codigo = $_POST['codigo'];
        $resultado = $modelo_i->insertar($fecha, $metodo, $codigo);

    }else{

    }
?>