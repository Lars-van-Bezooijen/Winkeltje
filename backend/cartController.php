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
else if($action = "order")
{
    require_once('conn.php');
    $query = "INSERT INTO orders (products, email_recipient) VALUES (:products, :email_recipient)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":products" => json_encode($_SESSION['cart']),
        ":email_recipient" => "test"
    ]);

    $_SESSION['order_success'] = true;
    unset($_SESSION['cart']);
    header("Location: ../index.php");
}


?>