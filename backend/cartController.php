<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen";
    header("Location: ../login.php?msg=$msg");
    exit;
}

$action = $_POST['action'];

if($action == "create"){
    $amount = $_POST['amount'];
    $product_id = $_POST['product_id'];
    
    if($amount == null || $amount == 0)
    {
        die("Geen geldig aantal gekozen");
        
    }
    
    $_SESSION['cart'][$product_id] = $amount;
    
    header("Location: ../products.php");
}


?>