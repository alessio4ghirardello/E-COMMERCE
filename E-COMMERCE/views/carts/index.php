<?php
require_once "../../models/Cart.php";
require_once "../../models/User.php";
require_once "../../models/Product.php";

session_start();


if (!isset($_SESSION['current_user'])) {
    exit(); // l'isset torna true se la condizione è verificata
}


$current_user = $_SESSION['current_user'];
$carrello = Cart::FindByUser($current_user->GetId());


if ($carrello) {
    $cart_products = $carrello->Find();
    $products = []; // array chiave valore es. $products["quantita"] => Prodotto1 (oggetto di tipo Prodotto)
    foreach ($cart_products as $cp) {
        $products[$cp->getQuantita()] = Product::Find($cp->getProductId());
    }
} else {

    exit();
}
?>

<html>
<head>
    <title>Carrello</title>
</head>

<body>
<?php $totale = 0;
foreach ($products as $quantita => $product) { ?>
    <ul>
        <li><?php echo $product->getMarca(); ?></li>
        <li><?php echo $product->getNome(); ?></li>
        <li><?php echo $product->getPrezzo(); ?></li>
        <li><?php echo $quantita; ?></li>
        <li><?php echo $quantita * $product->getPrezzo();
            $totale += $quantita * $product->getPrezzo(); ?></li>
    </ul>

    <form action="../../actions/edit_cart.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $carrello->getId(); ?>"
    </form>
<?php } ?>

<p>Totale carrello: <?php echo $totale; ?></p>
</body>
</html>
