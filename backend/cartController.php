<?php

session_start();

$amount = $_POST['amount'];
$product_id = $_POST['product_id'];

if($amount == null || $amount == 0)
{
    die("Error: amount is niet ingesteld of is 0");
}

// if cart is empty
if(!isset($_SESSION['product_id']))
{
    $_SESSION['product_id'] = $product_id;
}

if(!isset($_SESSION['amount']))
{
    $_SESSION['amount'] = $amount;
    exit;
}



$_SESSION['product_id'] += $product_id;
$_SESSION['amount'] += $amount;

var_dump($_SESSION);

?>