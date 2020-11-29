<?php
    include_once "../controller/crud.php";
    $modelo = new administrar();
    $resultado = $modelo->visualizar();
    echo "<a href='../index.php'>Atras</a><br>";
    echo "<a href='insertar.php'>Agregar datos</a>";
    echo "<table border='1' width='60%'>";
    echo "<tr>";
    echo "<th>Fecha</th>";
    echo "<th>Metodo envio</th>";
    echo "<th>Codigo producto</th>";
    echo "<th>Accion</th>";
    echo "<tr>"; 
    if($resultado){
        foreach ($resultado as $row => $item){
            echo '
            <td>'.utf8_encode($item["fecha_e"]).'</td>
            <td>'.utf8_encode($item["metodo_e"]).'</td>
            <td>'.utf8_encode($item["codigo_p3"]).'</td>
            <td><a href="quitar.php?id='.$item["codigo_e"].'">Eliminar</a> | 
            <a href="actualizar.php?id='.$item["codigo_e"].'">Editar</a>
            </tr>
            ';
        }
        echo "</table>";
    }
?>