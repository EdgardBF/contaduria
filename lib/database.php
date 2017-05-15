<?php
//se coloca el nombre de la clase la cual es database
class Database
{
    private static $connection;
    //hacemos una funcion privada la cual nos servira para crear una conexion a la base de datos
    private static function connect()
    {
        $server = "localhost"; //colocamos el nombre del sevidor
        $database = "contaduria"; // nombre de la base de datos
        $username = "root"; //usuario con el cual se tendra acceso
        $password = ""; //y la contraseña
        //lo que hace es colocar todo a utf8 es decir para aceptar caracteres especiales
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
        self::$connection = null;
        //en el try lo que hacemos es colocar la linea para crear la conexcion
        try
        {
            self::$connection = new PDO("mysql:host=".$server."; dbname=".$database, $username, $password, $options);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            die($exception->getMessage());
        }
    }
//hacemos que la funcion haga una desconexion de la base
    private static function desconnect()
    {
        self::$connection = null;
    }

//Esta funcion es utilizada para ejecutrar el query que se le mande ya sea un insert un update y un delete
    public static function executeRow($query, $values)
    {
        self::connect();//inicia la conexion a la base de datos
        $statement = self::$connection->prepare($query);//preparamos el query es decur la funcion que le hemos puesto ya sea un insert, update, etc
        $statement->execute($values);//colocamos los valores a enviar
        self::desconnect();//termina la conexion a la base de datos
    }
//Esta funcion se utiliza para los select con un where unico es decir solo una fila
    public static function getRow($query, $values)
    {
        self::connect();//Inicia la conexion a la base de datos
        $statement = self::$connection->prepare($query);//se prepara el query ah ejecutar en este caso un select
        $statement->execute($values);//los valor que se envian
        self::desconnect();//Termina la conexion
        return $statement->fetch(PDO::FETCH_BOTH);//se retornan los valores
    }
//esta funcion es utilizada para mandar a llamar una gran cantidad de filas para los querys de select y search
    public static function getRows($query, $values)
    {
        self::connect();//Inicia la conexion a base
        $statement = self::$connection->prepare($query);//prepara el query que en este caso seria un select
        $statement->execute($values);//los valores a enviar
        self::desconnect();//se desconecta de la base
        return $statement->fetchAll(PDO::FETCH_BOTH);//regresa los datos pedidos
    }
}
?>