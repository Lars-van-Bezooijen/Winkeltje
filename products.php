<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="split">
                <img class="img" src="<?php echo $product['img_dir'] ?>" alt="">              
                <p class="name"><?php echo $product['name']; ?></p>                
                <p class="description"><?php echo "Beschrijving: " . $product['description']; ?></p>
                <p class="price">&euro;<?php echo $product['price']; ?></p>
                <?php
                    if($product['stock'] == 0){
                        echo '<p class="stock-empty">Niet leverbaar!</p>';
                    }
                ?>
            </div>
            <div class="split">
                <form class="amount" action="">
                    <input type="number" name="amount" id="amount" min="0" max="<?php echo $product['stock']; ?>">
                    <input type="submit" value="in winkelwagen">
                </form>
            </div>
            
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>