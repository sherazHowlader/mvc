<?php 

    class Index extends MainController{

        public function __construct() {
            parent::__construct();
        }

        public function home(){
            $this->read();
        }

        public function read(){          

            $this->load->view('wellcome');
            
        }

    
    

    }

?>