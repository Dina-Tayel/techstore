<?php 

// pAthes and urls
// $absolute_path=__DIR__. "/";   
 // C:\xampp\htdocs\techstore this is the absolute path of folders
 // using path in includes include , require, require_once
define('PATH',__DIR__."/");    
// give us the directory  dynamically
// using in assets , links of html in href of anchor tage[css,js , imeges ,href] , header location
define("URL","http://localhost/techstore/");


define('APATH',__DIR__."/admin/");  
define("AURL","http://localhost/techstore/admin/");
// db credentials

define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","techstore");
// include classes
require_once(PATH . "vendor/autoload.php");

// objects

use TechStore\Classes\Request;
use TechStore\Classes\Session;
$request=new Request;
$session=new Session;
