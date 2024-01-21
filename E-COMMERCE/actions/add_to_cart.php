<?php
require_once "../models/Cart.php";
require_once "../models/Product.php";
require_once "../models/User.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    if (isset($_SESSION['current_user'])) {
        $user = $_SESSION['current_user'];
        $product = Product::Find($_POST['id']);

        if ($product) {
            $cart = Cart::FindByUser($user->GetId());
            $cart->AddProducts(['product_id' => $product->getId(), 'quantita' => $_POST['quantita']]);

            echo "Prodotto aggiunto al carrello!";
        } else {
            echo "Errore: Prodotto non trovato.";
        }
    } else {
        echo "Errore: Utente non autenticato.";
    }
} else {
    echo "Errore: ID del prodotto non fornito.";
}
?>
