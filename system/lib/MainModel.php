<?php 

    class MainModel extends DB{

        public function __construct(){
            parent::__construct();
         }

        public function insert($sql,$Data){
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($Data);
        }

        public function select($sql){
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }       

        public function update($sql){
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();            
        }

        public function upArrayData($sql,$data){

            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindParam(":$key", $value);
            } 

            return $stmt->execute();
        }

        public function delete($sql){
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();            
        }

        public function count($sql){
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $stmt->fetchAll();
            return $stmt->rowCount();
        }
    }

?>