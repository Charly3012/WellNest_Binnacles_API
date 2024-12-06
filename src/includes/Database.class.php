<?php
ob_start();
    class Database{
        private $host;
        private $user;
        private $password;
        private $database;

    public function __construct() {
        $this->host = getenv('SERVER');                  // O $_ENV['SERVER']
        $this->user = getenv('USER_WELLNEST');           // O $_ENV['USER_WELLNEST']
        $this->password = getenv('CONTRASENA_WELLNEST'); // O $_ENV['CONTRASENA_WELLNEST']
        $this->database = getenv('DATABASE');            // O $_ENV['DATABASE']
    }

        public function getConnection(){
            $hostDB = "mysql:host=".$this->host.";dbname=".$this->database.";";

            try{
                $connection = new PDO($hostDB, $this->user, $this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            }catch(PDOException $e){

            }
        }


    }
?>