<?php
    include_once "../controller/crud.php";
    $modelo_a = new administrar();

    echo "<form action='agregar.php' method='post'>
    <table>
        <tr>
            <td>Observaciones</td>
            <td><input type='text' name='observaciones'></td>
        </tr>
        <tr>
            <td>codigo_e1</td>
            <td><input type='text' name='codigo_e1'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Agregar'></td>
        </tr>
    </table>
</form>";

    if(isset($_POST['Submit'])){
        $observaciones = $_POST['observaciones'];
        $codigo_e1 = $_POST['codigo_e1'];
        $resultado = $modelo_a->agregar_reclamos($observaciones, $codigo_e1);
        
    }else{
        
    }

?>
