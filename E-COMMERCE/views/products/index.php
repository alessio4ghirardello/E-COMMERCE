<?php
session_start();

require_once '../../models/User.php';

require_once '../../models/Product.php';

$products = Product::fetchAll();

foreach ($products as $product) { ?>
    <ul>
        <li><?php echo $product->getMarca() ?></li>
        <li><?php echo $product->getNome() ?></li>
        <li><?php echo $product->getPrezzo() ?></li>
    </ul>

    <form action="../../actions/add_to_cart.php" method="POST">
        <input type="number" name="quantita" placeholder="quantita">
        <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
        <input type="submit" value="Aggiungi al Carrello">
    </form>
<?php } ?>

<a href="../../actions/logout.php">
    <button name="logout">Logout</button>
</a>

<a href="../carts/index.php">
    <button name="carrello">Vai al carrello</button>
</a>


</body>
</html>
