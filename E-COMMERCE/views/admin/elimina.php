<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina Prodotto</title>
</head>
<body>

<h1>Elimina Prodotto</h1>

<form action="../admin/Eliminazione.php" method="POST">
    <label for="id">ID del prodotto da eliminare:</label>
    <input type="number" name="id" required>

    <button type="submit">Elimina prodotto</button>
</form>

</body>
</html>

