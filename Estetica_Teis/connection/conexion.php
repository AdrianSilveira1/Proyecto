<?php
class Connection
{
    // Contenedor Instancia de la clase
    private static $instance = NULL;
    private $con = NULL;
    // Constructor privado, previene la creación de objetos vía new
    private function __construct() {
       
            $host = "localhost";
            $usr = "root";
			$psw = "estetica_teis";
            $database= "estetica_teis";
       
        try {
            $this->con = new mysqli($host, $usr, $psw,$database);
                      
                
        } 
        catch (mysqli_sql_exception $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }

    // Clone no permitido
    private function __clone() { }

    // Método conexion
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->con;
    }
    
    public function close(){
        die();
    }
}