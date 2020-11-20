<?php

class Conexiondb {
    public function conectar(){
        $localhost = "localhost";
        $database = "coolstyle";
        $user = "root";
        $password = "";
        $link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);
        //return var_dump($link);
        return $link;
    }
}
//$obj = new Conexiondb();
//$obj -> conectar();

?>