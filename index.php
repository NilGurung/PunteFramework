<?php
 define ( 'SEPARATOR', DIRECTORY_SEPARATOR );
 define ( 'BASE_PATH', dirname(realpath(__FILE__)) ); //realpath gives absolute path without some constraints like ','
 define ( 'APP_PATH', BASE_PATH . SEPARATOR . "application" . SEPARATOR );
 define ( 'SYSTEM_PATH', BASE_PATH . SEPARATOR . "system" . SEPARATOR );
 
 # Uncomment line below to enable error reporting 
 define ( 'DEVELOPMENT_MODE', 'true' );
 
 function setErrorReporting(){
     if( defined('DEVELOPMENT_MODE') && DEVELOPMENT_MODE ) {        
         error_reporting( E_ALL );
         ini_set( 'display_errors', 'true' );
     } else {         
         error_reporting( 0 ); //disable errors
         ini_set( 'display_errors', 'false' );
         ini_set( 'log_errors', 'on' );
         ini_set( 'error_log', BASE_PATH . SEPARATOR . "temp" . SEPARATOR . "logs" . SEPARATOR . "errors.log" );
     }
 }
 
 setErrorReporting();
 
 if( isset( $_SERVER['PATH_INFO'] )) $path = $_SERVER['PATH_INFO'];
 
 include SYSTEM_PATH . "core" . SEPARATOR . "system.php";