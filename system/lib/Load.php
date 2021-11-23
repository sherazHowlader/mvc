<?php 

    class Load{        

        public function view($fileName, $rcvData = array()){
            if ($rcvData == true) {
                extract($rcvData);
            }
           include 'app/views/'.$fileName.'.php';
        }

        public function model($modelName){
            include 'app/models/'.$modelName.'.php';
            return new $modelName();
         }

    }

?>