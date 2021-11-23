<?php 
    function __autoload($className){
        include "system/lib/".$className.".php";
    }
    include "app/config/config.php";
    
    // get url    
    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];
        $url = rtrim($url,'/');
        $url = explode('/',$url);
    }  
    

    if (isset($url[0])) {
       $fileName = "app/controllers/".$url[0].".php";

       if (file_exists($fileName)) {
            include "app/controllers/".$url[0].".php";
            $ctrl = new $url[0]();
       } else {
           header("location: index.php");
       }
       if (isset($url[2])) {

           if (method_exists($url[0],$url[1])) {
                $method = $url[1];
                $ctrl->$method($url[2]);
           } else {
            // header("location: index.php");
            header("Location: "."../");
           }
       } else {
           if (isset($url[1])) {

                if (method_exists($url[0],$url[1])) {
                    $method = $url[1];
                    $ctrl->$method();
            } else {
                // header("location: index.php");
                header("Location: "."../".$url[0]);
                
            }
           }
       }
    } else {
        include "app/controllers/Index.php";
        // include "app/controllers/".$url[0].".php";
        $ctrl = new Index();
        $ctrl->home();
    }
    
?>