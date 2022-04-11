<?php

session_start();

$amount = $_POST['amount'];

if($amount == null || $amount == 0)
{
    die("Error: amount is niet ingesteld of is 0");
}

echo $amount

?>