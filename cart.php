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
    <div class="center">
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
    </div>
    <div class="center">
        <div class="info">
            <p class="cart-p">Gegevens geadresseerde</p>
            <form class="cart-form" action="" method="POST">
                <div class="form-group">
                    <label for="">Naam</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label for="">Adres</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label for="">Woonplaats</label>
                    <input type="text">
                </div>
                <div class="form-group">
                    <label for="">Tel. nummer</label>
                    <input type="tel">
                </div>
            </form>
        </div>
        <div class="pay">
            <p class="cart-p">Betaal gegevens</p>
            <form class="cart-form" action="" method="POST">
                <div class="form-group">
                    <label for="">Betaalwijze</label>
                    <select name="betaalwijze" id="betaalwijze">
                        <option value="ing">ING</option>
                        <option value="ing">Rabobank</option>
                        <option value="ing">Paypal</option>
                        <option value="ing">Visa</option>
                        <option value="ing">Mastercard</option>
                    </select>              
                </div>
                <div class="form-group">
                    <label for="">Rekeningnummer</label>
                    <input type="text">
                </div>
            </form>
        </div>
        <div class="test">
            <form action="backend/cartController.php" method="POST">
                <input type="hidden" name="action" value="order">
                <input class="submit-btn" type="submit" value="Plaats bestelling">
            </form>
        </div>
    </div>
    
</body>
</html>
