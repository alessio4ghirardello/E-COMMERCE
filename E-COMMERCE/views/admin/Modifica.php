<?php
require "../admin/Admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$params = [
"id" => $_POST["id"],
"nome" => $_POST["nome"],
"prezzo" => $_POST["prezzo"]
];

try {
$admin = new Admin();
$controllo = $admin->Update($params);//essendo booleano assegno il risultato dell'update

if ($controllo) {
echo "Prodotto aggiornato con successo.";
} else {
echo "Impossibile aggiornare il prodotto.";
}
} catch (PDOException $e) {
echo "Errore nell'aggiornamento del prodotto: " . $e->getMessage();
}
}
