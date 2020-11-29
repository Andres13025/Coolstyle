<?php

include_once "../controller/crud.php";
$modelo = new administrar();
$resultado = $modelo->mostrar_reclamos();
echo "<a href='../index.php'>Atras</a><br>";
echo "<a href='agregar.php'>Agregar datos</a>";
    echo "<table border='1' width='60%'>";
    echo "<tr>";
    echo "<th>codigo_r</th>";
    echo "<th>Observaciones</th>";
    echo "<th>Codigo_e1</th>";
    echo "<th>Accion</th>";
    echo "<tr>"; 
    if($resultado){
        foreach ($resultado as $row => $item){
            echo '
            <td>'.utf8_encode($item["codigo_r"]).'</td>
            <td>'.utf8_encode($item["observaciones"]).'</td>
            <td>'.utf8_encode($item["codigo_e1"]).'</td>
            <td><a href="eliminar.php?id='.$item["codigo_r"].'">Eliminar</a> | <a href="editar.php?id='.$item["codigo_r"].'">Editar</a>
            </tr>
            ';
        }
        echo "</table>";
    }


?>