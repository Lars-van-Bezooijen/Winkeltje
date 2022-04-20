<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once "head.php"
    ?> 
    <title>Producten</title>
</head>
<body>
    <?php 
        require_once "header.php"
    ?>  

    <?php
        require_once 'backend/conn.php';
        $query = "SELECT * FROM products";
        $statement = $conn->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="wrapper">
        <?php foreach($products as $product): ?> 
            <div class="product">
                <div class="split column-split">
                    <div class="section">
                        <img class="img" src="<?php echo $product['img_dir'] ?>" alt="">
                    </div>
                    <div class="section">
                        <p class="name"><?php echo $product['name']; ?></p>                
                        <p class="description"><?php echo "Beschrijving: " . $product['description']; ?></p>
                        <p class="price">&euro;<?php echo $product['price']; ?></p>
                        <?php
                            if($product['stock'] == 0){
                                echo '<p class="stock-empty">Niet leverbaar!</p>';
                            }
                        ?>
                    </div> 
                </div>
                <div class="split">
                    <form class="amount" action="backend/cartController.php" method="POST">
                        <input type="hidden" name="action" value="create">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input required type="number" name="amount" id="amount" min="0" max="<?php echo $product['stock']; ?>">
                        <input type="submit" value="in winkelwagen" class="winkelwagen">
                    </form>
                </div>
                
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>