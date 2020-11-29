<?php
    require_once "../model/config.php";
    class administrar extends Conexiondb{
        private $conexion;
        public function __construct(){
            $this->conexion = Conexiondb::conectar();
        }
        //yo - producto
        public function mostrar(){
            $hola = $this->conexion->prepare("SELECT codigo_pr, nombre_producto, cantidad, precio, 
            talla FROM producto ORDER BY codigo_pr");
            $hola->execute();
            $hola->bindColumn("codigo_pr",$codigo_pr);
            $hola->bindColumn("nombre_producto",$nombre_producto);
            $hola->bindColumn("cantidad",$cantidad);
            $hola->bindColumn("precio",$precio);
            $hola->bindColumn("talla",$talla);
            return $hola->fetchAll();
            $hola->close();
        }
        public function agregar($nombre, $cantidad, $precio, $talla){
            $stmt = $this->conexion->prepare("INSERT INTO producto(nombre_producto, 
            cantidad, precio, talla)VALUES(:nombre, :cantidad, :precio, :talla)");
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':cantidad', $cantidad);
            $stmt->bindparam(':precio', $precio);
            $stmt->bindparam(':talla', $talla);
            $stmt->execute();
            header('Location: ../producto/producto.php');
        }
        public function eliminar($id){
            $stmt = $this->conexion->prepare("DELETE FROM producto WHERE codigo_pr=$id");
            $stmt->execute();
            header('Location: ../producto/producto.php');
        }
        public function ObtenerDatos($id){
            $stmt = $this->conexion->prepare("SELECT * FROM producto WHERE codigo_pr=$id");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        public function editar($id, $codigo, $nombre, $cantidad, $precio, $talla){
            $stmt = $this->conexion->prepare("UPDATE producto SET codigo_pr=:codigo_pr, 
            nombre_producto=:nombre, cantidad=:cantidad, precio=:precio, talla=:talla WHERE codigo_pr=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':codigo_pr', $codigo);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':cantidad', $cantidad);
            $stmt->bindparam(':precio', $precio);
            $stmt->bindparam(':talla', $talla);
            $stmt->execute();
            header('Location: ../producto/producto.php');
        }
        //yo2 - reclamos
        public function mostrar_reclamos(){
            $hola = $this->conexion->prepare("SELECT codigo_r, observaciones, codigo_e1 FROM reclamos 
            ORDER BY codigo_r");
            $hola->execute();
            $hola->bindColumn("codigo_r",$codigo_r);
            $hola->bindColumn("observaciones",$observaciones);
            $hola->bindColumn("codigo_e1",$codigo_e1);
            return $hola->fetchAll();
            $hola->close();
        }
        public function agregar_reclamos($observaciones, $codigo_e1){
            $stmt = $this->conexion->prepare("INSERT INTO reclamos(observaciones, 
            codigo_e1)VALUES(:observaciones, :codigo_e1)");
            $stmt->bindparam(':observaciones', $observaciones);
            $stmt->bindparam(':codigo_e1', $codigo_e1);
            $stmt->execute();
            header('Location: ../reclamos/reclamos.php');
        }
        public function eliminar_reclamos($id){
            $stmt = $this->conexion->prepare("DELETE FROM reclamos WHERE codigo_r=$id");
            $stmt->execute();
            header('Location: ../reclamos/reclamos.php');
        }
        public function ObtenerDatos_reclamos($id){
            $stmt = $this->conexion->prepare("SELECT * FROM reclamos WHERE codigo_r=$id");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        public function editar_reclamos($id, $codigo_r, $observaciones, $codigo_e1){
            $stmt = $this->conexion->prepare("UPDATE reclamos SET codigo_r=:codigo_r, 
            observaciones=:observaciones, codigo_e1=:codigo_e1 WHERE codigo_r=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':codigo_r', $codigo_r);
            $stmt->bindparam(':observaciones', $observaciones);
            $stmt->bindparam(':codigo_e1', $codigo_e1);
            $stmt->execute();
            header('Location: ../reclamos/reclamos.php');
        }
        //pablo
        public function visualizar(){
            $stmt = $this->conexion->prepare("SELECT codigo_e, fecha_e, metodo_e, codigo_p3 FROM 
            envio ORDER BY codigo_e");  
            $stmt->execute();
            $stmt->bindColumn("codigo_e",$codigo_e);
            $stmt->bindColumn("fecha_e",$fecha_e);
            $stmt->bindColumn("metodo_e",$metodo_e);
            $stmt->bindColumn("codigo_p3",$codigo_p3);
            return $stmt->fetchAll();
            $stmt->close();
          }
          public function insertar($fecha, $metodo, $codigo){
              $stmt = $this->conexion->prepare("INSERT INTO envio(fecha_e, metodo_e, codigo_p3)VALUES
              (:fecha, :metodo, :codigo)");
              $stmt->bindparam(':fecha', $fecha);
              $stmt->bindparam(':metodo', $metodo);
              $stmt->bindparam(':codigo', $codigo);
              $stmt->execute();
              header('Location: envio.php');
          }
          public function quitar($id){
              $stmt = $this->conexion->prepare("DELETE FROM envio WHERE codigo_e=$id");
              $stmt->execute();
              header('Location: envio.php');
          }
          public function ImprimirDatos($id){
              $stmt = $this->conexion->prepare("SELECT * FROM envio WHERE codigo_e=$id");
              $stmt->execute();
              return $stmt->fetch();
              $stmt->close();
          }
          public function actualizar($id, $fecha, $metodo, $codigop){
              $stmt = $this->conexion->prepare("DELETE FROM envio WHERE codigo_e=$id");
              $stmt = $this->conexion->prepare("UPDATE envio SET fecha_e=:fecha_e, metodo_e=:metodo_e, codigo_p3=:codigo_p3 WHERE codigo_e=:id");
              $stmt->bindparam(':id',$id);
              $stmt->bindparam(':fecha_e',$fecha);
              $stmt->bindparam(':metodo_e',$metodo);
              $stmt->bindparam(':codigo_p3',$codigop);
              $stmt->execute();
              header('Location: envio.php');
          }
          //jonathan
          public function mostrar_proveedor(){
            $hola = $this->conexion->prepare("SELECT codigo_a, nombre_proveedor, direccion, telefono, 
            correo FROM proveedor ORDER BY codigo_a");
            $hola->execute();
            $hola->bindColumn("codigo_a",$codigo_a);
            $hola->bindColumn("nombre_proveedor",$nombre_proveedor);
            $hola->bindColumn("direccion",$direccion);
            $hola->bindColumn("telefono",$telefono);
            $hola->bindColumn("correo",$correo);
            return $hola->fetchAll();
            $hola->close();
        }
        public function agregar_proveedor($nombre_proveedor, $direccion, $telefono, $correo){
            $stmt = $this->conexion->prepare("INSERT INTO proveedor(nombre_proveedor, 
            direccion, telefono, correo)VALUES(:nombre_proveedor, :direccion, :telefono, :correo)");
            $stmt->bindparam(':nombre_proveedor', $nombre_proveedor);
            $stmt->bindparam(':direccion', $direccion);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->execute();
            header('Location: proveedor.php');
        }
        public function eliminar_proveedor($id){
            $stmt = $this->conexion->prepare("DELETE FROM proveedor WHERE codigo_a=$id");
            $stmt->execute();
            header('Location: proveedor.php');
        }
        public function ObtenerDatos_proveedor($id){
            $stmt = $this->conexion->prepare("SELECT * FROM proveedor WHERE codigo_a=$id");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        public function editar_proveedor($id, $codigo_a, $nombre_proveedor, $direccion, $telefono, $correo){
            $stmt = $this->conexion->prepare("UPDATE proveedor SET codigo_a=:codigo_a, 
            nombre_proveedor=:nombre_proveedor, direccion=:direccion, telefono=:telefono, correo=:correo WHERE codigo_a=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':codigo_a', $codigo_a);
            $stmt->bindparam(':nombre_proveedor', $nombre_proveedor);
            $stmt->bindparam(':direccion', $direccion);
            $stmt->bindparam(':telefono', $telefono);
            $stmt->bindparam(':correo', $correo);
            $stmt->execute();
            header('Location: proveedor.php');
        }
        //dick
        public function mostrar_pedido(){
            $hola = $this->conexion->prepare("SELECT codigo_p, calle, ciudad, fecha_p, 
            marca, color, carrito FROM pedido ORDER BY codigo_p");
            $hola->execute();
            $hola->bindColumn("codigo_p",$codigo_p);
            $hola->bindColumn("calle",$calle);
            $hola->bindColumn("ciudad",$ciudad);
            $hola->bindColumn("fecha_p",$fecha_p);
            $hola->bindColumn("marca",$marca);
            $hola->bindColumn("color",$color);
            $hola->bindColumn("carrito",$carrito);
            return $hola->fetchAll();
            $hola->close();
        }
        public function agregar_pedido($calle, $ciudad, $fecha_p, $marca, $color, $carrito){
            $stmt = $this->conexion->prepare("INSERT INTO pedido( calle, 
            ciudad, fecha_p, marca, color, carrito)VALUES(:calle, :ciudad, :fecha_p, :marca, :color, :carrito)");
            
            $stmt->bindparam(':calle', $calle);
            $stmt->bindparam(':ciudad', $ciudad);
            $stmt->bindparam(':fecha_p', $fecha_p);
            $stmt->bindparam(':marca', $marca);
            $stmt->bindparam(':color', $color);
            $stmt->bindparam(':carrito', $carrito);
            $stmt->execute();
            header('Location: pedido_p.php');
        }
        public function eliminar_pedido($id){
            $stmt = $this->conexion->prepare("DELETE FROM pedido WHERE codigo_p=$id");
            $stmt->execute();
            header('Location: pedido_p.php');
        }
        public function ObtenerDatos_pedido($id){
            $stmt = $this->conexion->prepare("SELECT * FROM pedido WHERE codigo_p=$id");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        public function editar_pedido($id, $codigo_p, $calle, $ciudad, $fecha_p, $marca, $color, $carrito){
            $stmt = $this->conexion->prepare("UPDATE pedido SET codigo_p=:codigo_p, 
            calle=:calle, ciudad=:ciudad, fecha_p=:fecha_p, marca=:marca, color=:color, carrito=:carrito WHERE codigo_p=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':codigo_p', $codigo_p);
            $stmt->bindparam(':calle', $calle);
            $stmt->bindparam(':ciudad', $ciudad);
            $stmt->bindparam(':fecha_p', $fecha_p);
            $stmt->bindparam(':marca', $marca);
            $stmt->bindparam(':color', $color);
            $stmt->bindparam(':carrito', $carrito);
            $stmt->execute();
            header('Location: pedido_p.php');
        }
    }
?>