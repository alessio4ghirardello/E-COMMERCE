<?php ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        form {
            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #666;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #ff00ff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff33ff;
        }

        h2 {
            text-align: center;
            color: #ff00ff;
        }
    </style>
</head>

<body>
<form action="../actions/signup.php" method="post">
    <h2>Sign Up</h2>
    <input type="email" name="email" placeholder="Email" required>
    <br>

    <input type="password" name="password" placeholder="Password" required>
    <br>

    <input type="password" name="password-confirmation" placeholder="Conferma Password" required>
    <br>

    <input type="text" name="role_id" placeholder="role_id" required>
    <br>
    <input type="submit" value="Invio">
</form>
</body>


</html>

