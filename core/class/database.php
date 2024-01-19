<?php 


class Database { 
    
    private static $cont = null;

    public function __construct() { 
        die('Impossible de faire une instance de cette classe'); 
    } 
    
    public static function connect() { 
        if ( null == self::$cont ) { 
            try { 
                $configData = json_decode(file_get_contents('config.json'), true);
                self::$cont = new PDO("mysql:host=".$configData["dbHost"].";"."dbname=".$configData["dbName"], $configData["dbUsername"], $configData["dbUserPassword"]); 
            } catch(PDOException $e) { 
                die($e->getMessage()); 
            }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>