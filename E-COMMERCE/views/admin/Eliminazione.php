<?php

require "../admin/Admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    try {
        $admin = new Admin();
        $controllo = $admin->Delete($id);

        if ($controllo) {
            echo "Prodotto eliminato con successo.";
        } else {
            echo "Impossibile eliminare il prodotto.";
        }
    } catch (PDOException $e) {
        echo "Errore nell'eliminazione del prodotto: " . $e->getMessage();
    }
}


