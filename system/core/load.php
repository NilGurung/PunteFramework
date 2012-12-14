<?php
 class Load {
     public function model($model){
         //models naming rule - testModel.php
         $modelPath = APP_PATH . "models" . SEPARATOR;
         $model = strtolower( $model ) . "Model.php";
         
         if( file_exists( $modelPath . $model )) {
             //load model
             include $modelPath . $model;
         } else {
             echo "<br/><strong>Fatal Error:</strong> Couldn't find model <strong>" . $model . 
             "</strong> in <em>" . APP_PATH . "models</em> folder";
             die();
         }
     }
     
     public function view($view, $ext = "php"){
         //views naming rule - test.php/test.html
         $viewPath = APP_PATH . "views" . SEPARATOR;
         $view = strtolower( $view ) . '.' . $ext;
         
         if( file_exists( $viewPath . $view ) ) {
             //load view
             include $viewPath . $view;
         } else {
             echo "<br/><strong>Fatal Error:</strong> Couldn't find view <strong>" . $view . 
             "</strong> in <em>" . APP_PATH . "views</em> folder";
             die();
         }
     }
     
     /* public function controller($controller){
          //controllers naming rule - testController.php         
         $controllerPath = APP_PATH . "controllers" . SEPARATOR;// . $controllerName . ".php";
         $controller = strtolower( $controller ) . "Controller.php";
         
         if( file_exists( $controllerPath . $controller ) ){
             //load controller
             include $controllerPath . $controller;                          
         } else {
             echo "<br/><strong>Fatal Error:</strong> The controller <strong>" . $controllerName . ".php</strong> was not found in <em>" . APP_PATH . "</em> controllers";
             die();
         }
     } */
 }