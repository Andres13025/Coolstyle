<?php

include_once "crud.php";
$modelo = new administrar();
$resultado = $modelo->mostrar();
echo "<a href='agregar.php'>Agregar datos</a>";
    echo "<table border='1' width='60%'>";
    echo "<tr>";
    echo "<th>codigo</th>";
    echo "<th>Nombre_producto</th>";
    echo "<th>cantidad</th>";
    echo "<th>precio</th>";
    echo "<th>talla</th>";
    echo "<th>Accion</th>";
    echo "<tr>"; 
    if($resultado){
        foreach ($resultado as $row => $item){
            echo '
            <td>'.utf8_encode($item["codigo_pr"]).'</td>
            <td>'.utf8_encode($item["nombre_producto"]).'</td>
            <td>'.utf8_encode($item["cantidad"]).'</td>
            <td>'.utf8_encode($item["precio"]).'</td>
            <td>'.utf8_encode($item["talla"]).'</td>
            <td><a href="eliminar.php?id='.$item["codigo_pr"].'">Eliminar</a> | <a href="editar.php?id='.$item["codigo_pr"].'">Editar</a>
            </tr>
            ';
        }
        echo "</table>";
    }


?>