<?php

require_once '../models/User.php';
require_once '../models/Session.php';
require_once '../connection/DbManager.php';

session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$role_id = $_POST["role_id"];




$pdo = DbManager::Connect("ecommerce");

$stmt = $pdo->prepare("SELECT id, email, password FROM ecommerce.users WHERE email = :email AND password = :password LIMIT 1");
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$stmt->execute();
$user = $stmt->fetchObject("User");

if (!$user) {
    header('Location: /E-COMMERCE/views/login.php');
    exit;
} else if ($role_id == "1") {
    $_SESSION['current_user'] = $user;
    $params = array('ip' => '127.0.0.1', 'data_login' => date('d/m/y H:i'), 'user_id' => $user->getId());
    $_SESSION['object_session'] = Session::Create($params);
    header('Location: /E-COMMERCE/views/products/index.php');
    exit;
} else if ($role_id == "2") {
    $_SESSION['current_user'] = $user;
    $params = array('ip' => '127.0.0.1', 'data_login' => date('d/m/y H:i'), 'user_id' => $user->getId());
    $_SESSION['object_session'] = Session::Create($params);
    header('Location: /E-COMMERCE/views/admin/index_admin.php');
    exit;
}



?>


