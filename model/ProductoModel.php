<?php

class ProductoModel {
    private $DB;

    function __construct(){
        $this->DB = Database::connect();
    }

    function getAll(){
        $sql = 'SELECT * FROM productos ORDER BY titulo';
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->execute(); 
        $data = $sql_prep->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getLastAdded(){
        $sql = "SELECT id_producto, titulo, precio, categoria FROM productos
                ORDER BY id_producto DESC LIMIT 10;";
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

    function filterByName($search){
        $sql = "SELECT id_producto, titulo, precio, categoria 
                FROM productos
                WHERE titulo LIKE :search";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':search', "%$search%", PDO::PARAM_STR);
        $sql_prep->execute();
        $data = $sql_prep->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}