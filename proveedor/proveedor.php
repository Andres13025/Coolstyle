<?php

include_once "../controller/crud.php";
$modelo = new administrar();
$resultado = $modelo->mostrar_proveedor();
echo "<a href='../index.php'>Atras</a><br>";
echo "<a href='agregar.php'>Agregar datos</a>";
    echo "<table border='1' width='60%'>";
    echo "<tr>";
    echo "<th>codigo</th>";
    echo "<th>Nombre_proveedor</th>";
    echo "<th>direccion</th>";
    echo "<th>telefono</th>";
    echo "<th>correo</th>";
    echo "<th>Accion</th>";
    echo "<tr>"; 
    if($resultado){
        foreach ($resultado as $row => $item){
            echo '
            <td>'.utf8_encode($item["codigo_a"]).'</td>
            <td>'.utf8_encode($item["nombre_proveedor"]).'</td>
            <td>'.utf8_encode($item["direccion"]).'</td>
            <td>'.utf8_encode($item["telefono"]).'</td>
            <td>'.utf8_encode($item["correo"]).'</td>
            <td><a href="eliminar.php?id='.$item["codigo_a"].'">Eliminar</a> | <a href="editar.php?id='.$item["codigo_a"].'">Editar</a>
            </tr>
            ';
        }
        echo "</table>";
    }


?>