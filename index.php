<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <?php 
    require_once "head.php"
    ?>
    <title>Winkeltje</title>
</head>
<body>  
    <?php 
    require_once "header.php";
    ?>
    <?php if(isset($_SESSION['logged_in'])): ?>
        <div class="flex jcc aic">
            <div class="loggedin">
                <p>Je bent zojuist succesvol ingelogd!</p>
                <a class="close" href="">X</a>
            </div>
        </div>
        <?php unset($_SESSION['logged_in']); ?>
    <?php endif; ?>
</body>
</html>