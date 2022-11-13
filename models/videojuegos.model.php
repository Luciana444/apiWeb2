<?php

class VideojuegosModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_videojuegos;charset=utf8', 'root', '');
    }

    function GetVideojuegos($ordenarPor = null, $orden = null){
        if(isset($ordenarPor) && isset($orden)){
            $sentencia = $this->db->prepare("SELECT * FROM videojuegos ORDER BY $ordenarPor $orden");
            $sentencia->execute();
        }else{
            $sentencia = $this->db->prepare("SELECT * FROM videojuegos");
            $sentencia->execute();
        }

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetVideojuego($videojuego){
        $sentencia = $this->db->prepare("SELECT * FROM videojuegos WHERE id = ?");
        $sentencia->execute([$videojuego]);
        $Videojuego = $sentencia->fetch(PDO::FETCH_OBJ);

        return $Videojuego;
    }

    function AgregarVideojuego($videojuego,$fecha_de_lanzamiento,$descripcion,$caracteristica,$id_genero){
        $sentencia = $this->db->prepare("INSERT INTO videojuegos (nombre,fecha_de_lanzamiento,descripcion,caracteristica,id_genero) VALUES (?,?,?,?,?)");
        $sentencia->execute([$videojuego,$fecha_de_lanzamiento,$descripcion,$caracteristica,$id_genero]);

        return $this->db->lastInsertId();
    }

    function EliminarVideojuego($id){
        $sentencia =  $this->db->prepare("DELETE FROM videojuegos WHERE id = ?");
        $sentencia->execute([$id]);
    }

    function EditarVideojuego($nombre,$fecha_de_lanzamiento,$descripcion,$caracteristica,$id_genero,$id){
        $sentencia =  $this->db->prepare("UPDATE videojuegos SET nombre = ?, fecha_de_lanzamiento = ?, descripcion = ?, caracteristica = ?, id_genero = ? WHERE id = ?");
        $sentencia->execute([$nombre,$fecha_de_lanzamiento,$descripcion,$caracteristica,$id_genero,$id]);

        return $this->GetVideojuego($id);
    }
}