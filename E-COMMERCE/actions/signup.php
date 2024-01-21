<?php

require_once '../models/User.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password-confirmation'];
$role_id = $_POST["role_id"];




if (strcmp($password, $password_confirmation) != 0) {
    header('Location:http://localhost/E-COMMERCE/views/signup.php');
    exit;
}

$pdo = DbManager::Connect("ecommerce");

$stmt = $pdo->prepare("select id from ecommerce.users where email=:email limit 1");
$stmt->bindParam(":email", $email);
$stmt->execute();

$user = $stmt->fetchObject("user");

if (!$user) {
    $params = ['email'=>$email, 'password'=>$password, 'role_id'=>$role_id];
    $user = User::Create($params);
    if ($user) {
        Cart::Create($user->GetId());
        header('Location:http://localhost/E-COMMERCE/views/login.php');
        exit();
    } else {
        header('Location:http://localhost/E-COMMERCE/views/signup.php');
        exit();
    }

} else {
    header('Location:http://localhost/E-COMMERCE/views/signup.php');
    exit();

}


?>




