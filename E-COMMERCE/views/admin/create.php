<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

<h1>Creazione nuovo prodotto</h1>

<form action="Creazione.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>

    <label for="prezzo">Prezzo:</label>
    <input type="number" name="prezzo" step="0.01" required>

    <label for="marca">Marca:</label>
    <input type="text" name="marca" required>

    <input type="submit" value="Crea">
</form>

</body>
</html>

