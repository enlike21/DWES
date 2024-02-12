<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

class Database{
    private $server = "localhost";
    private $bbdd = "dwes_tarde_empresas";
    private $user = "Enrique";
    private $password = "quique123";

    private $db;

    public function __construct(){

        try{
        $this->db = new PDO("mysql:host=$this->server;dbname=$this->bbdd", $this->user, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch (Exception $e){
            die("Error con la base de datos: ".$e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->db=null;
    }

    public function getdb(){
        return $this->db;
    }


}