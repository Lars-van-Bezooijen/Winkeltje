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
    <?php if(isset($_SESSION['order_success'])): ?>
        <div class="flex jcc aic">
            <div class="loggedin">
                <p>Je hebt uw order vast gezet!</p>
                <a class="close" href="">X</a>
            </div>
        </div>
        <?php unset($_SESSION['order_success']); ?>
    <?php endif; ?>

    <div class="wrapper">
        <main>
            <h1>Welkom bij de scouting Het Winkeltje!</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis enim eum corrupti in. Ducimus deserunt culpa numquam sed voluptatum nostrum excepturi aliquam minus quos nisi. Accusantium est corrupti nulla deleniti et inventore tenetur dignissimos suscipit, ex soluta beatae atque non saepe. Assumenda eligendi quasi labore omnis cum deserunt error maxime veritatis. Delectus earum saepe dolores reiciendis?</p>
            <p>Bestel nu onze eigen artikelen <a href="products.php" class="cart-a">hier!</a></p>
        </main>
    </div>
    
</body>
</html>