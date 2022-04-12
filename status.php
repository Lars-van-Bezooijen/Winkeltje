<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen";
    header("Location: login.php?msg=$msg");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once "head.php"
    ?> 
    <title>Status</title>
</head>
<body>
<?php 
    require_once "header.php"
?>  
</body>
</html>