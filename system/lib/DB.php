<?php 
    class DB{
        protected $db;
        private static $pdo;

        // access fo $this->db->prepare($sql);
        public function __construct(){
            try {
                $this->db = new PDO('mysql:host=localhost;dbname=dbName','root','');                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $this->db;
        }

        
        // access fo DB::prepare($sql);
        public static function connection(){
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname=dbName','root','');                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return self::$pdo;
        }

        public static function prepare($sql){
            return self::connection()->prepare($sql);
        }

        
    }


