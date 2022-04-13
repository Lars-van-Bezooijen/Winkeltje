<header>
    <div class="divide">
        <img class="logo" src="img/logo.webp" alt="logo">
    </div>
    <div class="divide">
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php"> Producten</a>
            <a href="status.php">Status</a>
        </nav>
    </div>
    <div class="divide">
        <a class="nav-a" href="cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a class="nav-a" href="logout.php">Uitloggen</a>
        <?php else: ?>
            <a class="nav-a" href="login.php">Inloggen</a>
        <?php endif; ?>
    </div>  
</header>