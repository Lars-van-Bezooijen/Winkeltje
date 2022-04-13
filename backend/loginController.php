<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// echo password_hash($password, PASSWORD_DEFAULT);die;

require_once('conn.php');
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([":username" => $username]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
    die("Error: Geen bestaand account");
}

if(!password_verify($password, $user['password']))
{
    die("Error: Password klopt niet!");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['logged_in'] = true;

header("Location: ../index.php")

?>