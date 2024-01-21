<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>

<h1>Update Product</h1>

<form action="Modifica.php" method="POST">
    <label for="id">ID del prodotto da aggiornare:</label>
    <input type="number" name="id" required>

    <label for="nome">Nuovo Nome:</label>
    <input type="text" name="nome">

    <label for="prezzo">Nuovo Prezzo:</label>
    <input type="number" name="prezzo" step="0.01">

    <input type="submit" value="Update">
</form>

</body>
</html>

