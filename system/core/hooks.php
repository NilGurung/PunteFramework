<?php
 class Hook {
     protected $route, $controller, $method;
     
     function __construct(){         
         global $path;
         $this->route = $path; 
         
         $param = explode('/', $this->route);        
                  
         if( isset( $param[2] ) && !empty( $param[1] ) ) $this->controller = $param[1];
         else $this->controller = "welcome"; //default controller
         
         if( isset( $param[2] ) && !empty( $param[2] ) ) $this->method = $param[2];
         else $this->method = "index"; //default action
         
         self::loadController();         
         self::hookMethods();     
         self::loadView();    
     }
     
     public function loadController(){
         //controllers naming rule - testController.php
         $controllerName = $this->controller . "Controller";
         $controllerPath = APP_PATH . "controllers" . SEPARATOR;
         
         if( file_exists( $controllerPath . $controllerName . ".php" ) ){
             //load controller
             include $controllerPath . $controllerName . ".php";                          
         } else {
             echo "<br/><strong>Fatal Error:</strong> The controller <strong>" . $controllerName . ".php</strong> was not found in <em>" . APP_PATH . "</em> controllers";
             die();
         }
     }
     
     public function hookMethods(){
         //controller class naming rule - TestController
         $controllerClass = ucfirst( $this->controller ) . "Controller";
         
         if( class_exists( $controllerClass ) ){
             //instantiate class
             $obj = new $controllerClass();
             $action = $this->method;
                         
             if( is_callable( array($obj, $action) ) ){
                 //call action                 
                 $obj->$action();
             } else {
                 echo "<br/><strong>Fatal Error:</strong> Could not find the callable method <strong>" . $this->method . 
                 "</strong> in class <em>" . $controllerClass . "</em>";
                 die();
             }
         } else {
             echo "<br/><strong>Fatal Error:</strong> The class <strong>" . $controllerClass . 
             "</strong> was not found in <em>" . lcfirst( $controllerClass ) . ".php</em> controller";
             die();
         }
     }
     
     public function loadView(){
         //views naming rule - test.php/test.html
         $view = strtolower( $this->controller );
         $viewPath = APP_PATH . "views" . SEPARATOR;
         
         if( file_exists( $viewPath . $view . ".php" )) {
             //load view
             include $viewPath . $view . ".php";
         } else {
             echo "<br/><strong>Fatal Error:</strong> Couldn't find view <strong>" . $view . 
             "</strong> in <em>" . APP_PATH . "views</em> folder";
             die();
         }         
     }
 }