<?php
define('ROOT_DIRECTORY', dirname(__FILE__, 2));

class Database {
    /*comentario prueba 3*/
    /*  Se ve mi comentario?*/
    private static $db_name = 'technodrome';
    private static $host = 'localhost';
    private static $user_name = 'root';
    private static $user_pass = '';

    private static $conx = null;

    public function __construct(){
        die('Cannot instantiate an object of this class');
    }

    public static function connect(){
        if(self::$conx == null){
            try{
                self::$conx = new PDO('mysql:host='.self::$host.';'.
                                    "dbname=".self::$db_name,
                                    self::$user_name,
                                    self::$user_pass);
            }
            catch (PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$conx;
    }

    public static function disconnect(){
        self::$conx = null;
    }

}