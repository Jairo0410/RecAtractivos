<?php

    class FrontController{
        
        static function main(){
            require __DIR__.'/Constants.php';
           
            if(!empty($_GET['controller']))
                $nameController=$_GET['controller'].'Controller';
            else 
                $nameController='DefaultController';
            
            if(!empty($_GET['action']))
                $action=$_GET['action'];
            else  
                $action='home';
            
            $routeToController = routeController . $nameController.'.php';
            
            if(is_file($routeToController))
                require_once $routeToController;
            else{
                require_once routeController.'DefaultController.php';
                $controller = new DefaultController();
                $controller->notFound('Controlador '.$nameController. ' no encontrado');
                return FALSE;
            }
            
            if(is_callable(array($nameController, $action))==FALSE){
                require_once routeController.'DefaultController.php';
                $controller = new DefaultController();
                $controller->notFound($nameController.'->'.$action.' no existe');
                return FALSE;
            }

            session_start();
            
            $controller=new $nameController();
            $controller->$action();
            
        } // main
        
    } // fin de clase 

?>
