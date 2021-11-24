<?php

class ClienteModel{
    private $DB;

    function __construct(){
        $this->DB = Database::connect();
    }

    function getAll(){ # No se debería usar este método ya que trae toda la información sensible de todos los clientes
        $sql = 'SELECT * FROM clientes ORDER BY id_cliente';
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->query(); 
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getByID($id, $fields='*'){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT :fields FROM clientes WHERE id = :id_cliente"; # Se define la instrucción con valores placeholder
        $sql_prep = $this->DB->prepare($sql); # Se valida la instrucción

        $sql_prep->bindValue(':fields', $fields); # Se pasan los parámetros de manera segura para evitar SQL Injections
        $sql_prep->bindValue(':id_cliente', $id); 

        $sql_prep->query(); # finalmente se ejecuta la consulta y se almacenan los datos devueltos

        $data = $sql_prep->fetch(PDO::FETCH_ASSOC); # Se establece la manera en que los datos pueden ser accesados  
        return $data;                               # En este caso un array asociativo del tipo: ['nombre' -> 'Juan Pérez']
    }

    function logIn($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id_cliente, nombre, email, user_pass FROM clientes WHERE email = :email AND user_pass = :user_pass"; 
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':email', $data['email']);
        $sql_prep->bindValue(':user_pass', $data['user_pass']);
        $sql_prep->execute();
        $user = $sql_prep->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function update($id, $data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE clientes set id_cliente = :id,
                                    nombre = :nombre,
                                    apellidos = :apellidos,
                                    email = :email,
                                    contraseña = :contraseña,
                                    direccion_1 = :direccion_1,
                                    direccion_2 = :direccion_2,
                                    direccion_3 = :direccion_3,
                                    tarjeta_1 = :tarjeta_1,
                                    tarjeta_2 = :tarjeta_2";

        $sql_prep = $this->DB->prepare($sql); # Se valida la instrucción

        $sql_prep->bindValue(':id', $data['id_cliente']); # Se pasan los parámetros de manera segura para evitar SQL Injections
        $sql_prep->bindValue(':nombre', $data['nombre']);
        $sql_prep->bindValue(':apellidos', $data['apellidos']);
        $sql_prep->bindValue(':email', $data['email']);
        $sql_prep->bindValue(':contraseña', $data['contraseña']);
        $sql_prep->bindValue(':direccion_1', $data['direccion_1']);
        $sql_prep->bindValue(':direccion_2', $data['direccion_2']);
        $sql_prep->bindValue(':tarjeta_1', $data['tarjeta_1']);
        $sql_prep->bindValue(':tarjeta_2', $data['tarjeta_2']);
        $sql_prep->execute();
    }

    function signUp($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO clientes(nombre, apellidos, email, user_pass)
                VALUES (:nombre, :apellidos, :email, :user_pass)";
        $sql_prep = $this->DB->prepare($sql);
        
        $sql_prep->bindValue(':nombre', $data['nombre']);# Se pasan los parámetros de manera segura para evitar SQL Injections
        $sql_prep->bindValue(':apellidos', $data['apellidos']);
        $sql_prep->bindValue(':email', $data['email']);
        $sql_prep->bindValue(':user_pass', $data['user_pass']);   
        $sql_prep->execute();  
    }

    function isAddresAvaible($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT direccion_1, direccion_2, direccion_3
                FROM clientes
                WHERE id_cliente = :id";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':id', $id);
        $sql_prep->query();
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);

        if ($data['direccion_1'] == null){
            echo 'Se puede agregar direccion 1';
            return 1;
        }
        elseif ($data['direccion_2'] == null){
            echo 'Se puede agregar direccion 2';
            return 2;
        }
        elseif ($data['direccion_3'] == null){
            echo 'Se puede agregar direccion 3';
            return 3;
        }
        else {
            echo 'Ya no se pueden agregar direcciones';
            return 0;
        }
    }

    function updateAddres($id, $spot, $new_dir){ // Tanto para crear como para actualizar direcciones (?)
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "UPDATE clientes set direccion_$spot = :direccion 
                WHERE id_cliente = :id";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':direccion', $new_dir);
        $sql_prep->bindValue(':id', $id);
        $sql_prep->execute();
    }

    function isPedidoAvailable($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_pedido
                FROM pedidos
                WHERE id_cliente = :id LIMIT 1";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':id', $id);
        $sql_prep->query();
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);

        if ($data['id_pedido'] == null){
            echo 'No cuentas con pedidos en este momento :) ';
            return 1;
        }
        else{
            return $data;
        }

    }

    function isArticulosPedido($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_articulo
                FROM articulos
                WHERE id_pedido = :id";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':id', $id);
        $sql_prep->query();
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    function isPedido($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT precio, cantidad, id_producto
                FROM articulos
                WHERE id_articulos = :id";
        $sql_prep = $this->DB->prepare($sql);
        $sql_prep->bindValue(':id', $id);
        $sql_prep->query();
        $data = $sql_prep->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}