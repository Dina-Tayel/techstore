<?php 
namespace TechStore\Classes; 

class Session{
    
    public function __construct()
    {
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
       
    }
    public function sessionHas($key) : bool{
        return isset($_SESSION[$key]);
    }
    public function setSession($key,$value) {
        return $_SESSION[$key]=$value;
    }
    public function getSession($key){
        return $_SESSION[$key];
    }
    public function remove($key){
        unset($_SESSION[$key]);
    }
    public function destroy(){
        $_SESSION=[];
        session_destroy();
    }

}
