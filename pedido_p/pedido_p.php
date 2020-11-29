<?php

include_once "../controller/crud.php";
$modelo = new administrar();
$resultado = $modelo->mostrar_pedido();
echo "<a href='../index.php'>Atras</a><br>";
echo "<a href='agregar_p.php'>Agregar datos</a>";
    echo "<table border='1' width='60%'>";
    echo "<tr>";
    echo "<th>codigo_p</th>";
    echo "<th>calle</th>";
    echo "<th>ciudad</th>";
    echo "<th>fecha_p</th>";
    echo "<th>marca</th>";
    echo "<th>color</th>";
    echo "<th>carrito</th>";
    echo "<th>Accion</th>";
    echo "<tr>"; 
    if($resultado){
        foreach ($resultado as $row => $item){
            echo '
            <td>'.utf8_encode($item["codigo_p"]).'</td>
            <td>'.utf8_encode($item["calle"]).'</td>
            <td>'.utf8_encode($item["ciudad"]).'</td>
            <td>'.utf8_encode($item["fecha_p"]).'</td>
            <td>'.utf8_encode($item["marca"]).'</td>
            <td>'.utf8_encode($item["color"]).'</td>
            <td>'.utf8_encode($item["carrito"]).'</td>
            <td><a href="eliminar_p.php?id='.$item["codigo_p"].'">Eliminar</a> | <a href="editar_p.php?id='.$item["codigo_p"].'">Editar</a>
            </tr>
            ';
        }
        echo "</table>";
    }


?>