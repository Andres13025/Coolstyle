<?php
    require_once "../model/config.php";
    class administrar extends Conexiondb{
        private $conexion;
        public function __construct(){
            $this->conexion = Conexiondb::conectar();
        }
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
    }
?>