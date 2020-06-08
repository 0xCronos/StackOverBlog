<?php
include_once "config.php";

class Database{

    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $charset;

    public function __construct(){
        $this->host    = HOSTNAME;
        $this->user    = USERNAME;
        $this->pass    = PASSWORD;
        $this->dbname  = DBNAME;
        $this->charset = CHARSET;
    }

    /* Realiza conexion a mysql, retorna PDOSTATEMENT */
    public function connect(){
        try {
            $connection = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;
            //PDO config
            $config = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                       PDO::ATTR_EMULATE_PREPARES => false];

            //database handle
            $dbh = new PDO($connection, $this->user, $this->pass, $config);
        } catch (PDOException $e) {
            print_r("Error al conectarse: ".$e->getMessage());
        }
        return $dbh;
    }
}
?>
