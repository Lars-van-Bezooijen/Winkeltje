<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once "head.php"
    ?>
    <title>Inloggen</title>
</head>
<body>
    <?php 
        require_once "header.php"
    ?>  

    <main class="loginmain">
        <div class="loginform">
            <form action="backend/loginController.php" method="POST">
                <div class="form-group">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" value="Inloggen">
            </form>
        </div>
    </main>
</body>
</html>
