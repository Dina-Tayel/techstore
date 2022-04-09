<?php 

namespace TechStore\Classes\Models;
use TechStore\Classes\Models\Db;
use TechStore\Classes\Session;

class Admin extends Db{


    public function login($email,$password,Session $session){

        $this->sql="SELECT * FROM admins WHERE `email`='$email' LIMIT 1 ";
        $query=mysqli_query($this->connect,$this->sql);
        $admin=mysqli_fetch_assoc($query);
        if(!empty($admin)){

            $password_hashed=$admin['password'];
            $is_same=password_verify($password,$password_hashed);
            if($is_same){
                $session->setSession("adminId",$admin['id']);
                $session->setSession("adminName",$admin['name']);
                $session->setSession("adminEmail",$admin['email']);
                return true;

            }else{
                return false;
            }
            
        }else{
            return false;
        }
    }

    public function logout( Session $session){
        $session->remove('adminId');
        $session->remove('adminName');
        $session->remove('adminEmail');
    }

   

}

// password is 123456