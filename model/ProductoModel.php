<?php

class ProductoModel {
    private $DB;

    function __construct(){
        $this->DB = Database::connect();
    }

    function getAll(){ # No se debería usar este método ya que trae toda la información sensible de todos los clientes
        $sql = 'SELECT * FROM productos ORDER BY id_producto';
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->execute(); 
        $data = $sql_prep->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getLastAdded(){
        $sql = "SELECT * FROM productos
                ORDER BY id_producto LIMIT 10;";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->execute(); 
        $data = $sql_prep->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getByID($id){
        $sql = "SELECT * FROM productos WHERE id_producto = :id_producto";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue('id_producto', $id);
        $sql_prep->execute();
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

}