<?php

require "../admin/Admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $params = [
        "nome" => $_POST["nome"],
        "prezzo" => $_POST["prezzo"],
        "marca" => $_POST["marca"]
    ];

    try {
        $product = Admin::Create($params);
        echo "Prodotto creato con successo. ID: {$product->getId()}";
    } catch (PDOException $e) {
        echo "Errore nella creazione del prodotto: " . $e->getMessage();
    }
}

