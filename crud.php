<?php
    require_once "model/config.php";
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
            header('Location: producto.php');
        }
        public function eliminar($id){
            $stmt = $this->conexion->prepare("DELETE FROM producto WHERE codigo_pr=$id");
            $stmt->execute();
            header('Location: producto.php');
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
            header('Location: producto.php');
        }
    }




?>