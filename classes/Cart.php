<?php

namespace TechStore\Classes;

class Cart
{
    public function add(string $id, array $data)
    {

        $_SESSION["cart"][$id] = $data;
    }

    public function count()
    {
        return (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
    }

    public function total()
    {
        $total = 0 ;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $productDate) {
                $total += $productDate['qty'] * $productDate['price'];
            }
            
        }
        return $total;
    }

    public function redirect($path)
    {
        header("location: " . URL . $path);
    }
    public function has($id)
    {
        
        return isset($_SESSION['cart'])  ? array_key_exists($id, $_SESSION['cart']) : false ;
    }

    public function getAll()
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
    }


    public function empty(){
         $_SESSION['cart']=[];
    }
}
