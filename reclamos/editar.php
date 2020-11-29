<?php
    include_once "../controller/crud.php";
    $id = $_GET['id'];
    $modelo_o = new administrar();
    $modelo_e = new administrar();
    $datos = $modelo_o->ObtenerDatos_reclamos($id);//este solo trae los datos que seran editados

    //print_r($datos);
    //echo $datos['identificacion'];

    

    echo "<form action='editar.php' method='post'>
    <table>
        <tr>
            <td>Codigo</td>
            <td><input type='text' name='codigo_r' value='".$datos['codigo_r']."'></td>
        </tr>
        <tr>
            <td>Observaciones</td>
            <td><input type='text' name='observaciones' value='".$datos['observaciones']."'></td>
        </tr>
        <tr>
            <td>Codigo_e1</td>
            <td><input type='text' name='codigo_e1' value='".$datos['codigo_e1']."'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' name='Submit' value='Editar'></td>
            <td><input type='hidden' name='oculto' value='".$datos['codigo_r']."'></td>
        </tr>
    </table>
</form>";

if(isset($_POST['Submit'])){
    $id = $_POST['oculto'];
    $codigo_r = $_POST['codigo_r'];
    $observaciones = $_POST['observaciones'];
    $codigo_e1 = $_POST['codigo_e1'];
    $resultado = $modelo_e->editar_reclamos($id, $codigo_r, $observaciones, $codigo_e1);
    
}else{
    echo "no enviado";
}

?>