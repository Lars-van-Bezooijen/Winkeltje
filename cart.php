<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <?php 
    require_once "head.php";
    ?>
    <title>Winkelwagen</title>
</head>
<body>  
    <?php 
    require_once "header.php";
    $total = 0;

    if(empty($_SESSION['cart']))
    {
        ?>
        <div class="flex jcc aic">
            <div class="cart-empty">
                <p>Je winkelwagentje is leeg! Voeg producten toe uit de <a class="cart-a" href="products.php">producten pagina</a>.</p>
            </div>
        </div>
        <?php
        exit;
    }

    ?>
    <table>
        <thead>
            <th>Product</th>
            <th></th>
            <th>Beschrijving</th>
            <th>Aantal</th>
            <th>Prijs</th>
        </thead>
        <tbody>

            <?php foreach($_SESSION['cart'] as $product_id => $amount)
            {
                require_once 'backend/conn.php';
                $query = "SELECT * FROM products WHERE id = :id";
                $statement = $conn->prepare($query);
                $statement->execute([":id" => $product_id]);
                $product = $statement->fetch(PDO::FETCH_ASSOC);
                $totalProductPrice = $product['price'] * $amount;
                $total += $product['price'] * $amount;

                ?>
        
                <tr>
                    <td><img src="<?php echo $product['img_dir']; ?>" alt=""></td>
                    <td><?php echo ucfirst($product['name']); ?></td>
                    <td><?php echo ucfirst($product['description']); ?></td>
                    <td><?php echo $amount; ?></td>
                    <td>&euro;<?php echo $totalProductPrice; ?></td>
                </tr>
            
        <?php
    }   
    ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Totaal:</strong></td>
                <td><strong>&euro;<?php echo $total; ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
