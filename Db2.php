<?php
/**
 * Trabaja con una base de datos usando PDO
 * @author Cindy Calderon calderoncindy3@gmail.com
 * @link https://github.com
 * @version 0.1
 * @copyright 2023 
 */
class Db
{
   protected $connection;
   /**
    * Realizar una conexion a una base de datos usando PDO
    * 
    * @return connection 
    *
    */
    public function __construct()
   {
      try {
         $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"];
         $this->connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD, $options);
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
         }
         return $this->connection;
   }
   /**
    * cierra una conexion
    * @return void
    */
   public function close(){
      $this->connection=null;
   }
   /**
    * Ejecuta una query sql
    * @param String $sql
    * @param String $args 
    * @return object
    */
   public function run($sql, $args=NULL)
   {
      $stmt=$this->connection->prepare($sql);
      $stmt->execute($args);
      return $stmt;
   }

}
?>