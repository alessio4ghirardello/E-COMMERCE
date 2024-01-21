<?php

require_once __DIR__ . "/../connection/DbManager.php";
require_once __DIR__ . "/../models/Cart.php";
//includono dbmanager e cart che si trovano della directory superiore   ".." rispetto al percorso corrente "__DIR__"

class User
{
    private $id;
    private $email;
    private $password;
    private $cart_id;
    private $role_id;
    private $session_id;

    public function GetID()
    {
        return $this->id;
    }

    public function SetEmail($email)
    {
        $this->id = $email;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function SetPassword($password)
    {
        $this->password = $password;
    }

    public function GetPassword()
    {
        return $this->password;
    }

    public function GetCart_ID()
    {
        return $this->cart_id;
    }

    public function GetRole_ID()
    {
        return $this->role_id;
    }

    public function GetSession_ID()
    {
        return $this->session_id;
    }

    public static function Find($id)
    {
        $pdo = self::Connect();
        $stmt = $pdo->prepare("select * from ecommerce.users where id = :id");
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return $stmt->fetchObject("User");
        } else {
            throw new PDOException("Utente non trovato");
        }
    }

    public static function Create($params)
    {
        $pdo = self::Connect();
        $stmt = $pdo->prepare("insert into ecommerce.users (email,password, role_id) values (:email,:password, :role_id)");
        $stmt->bindParam(":email", $params["email"]);
        $stmt->bindParam(":password", $params["password"]);
        $stmt->bindParam(":role_id", $params["role_id"]);
        if ($stmt->execute()) {
            $stmt = $pdo->prepare("select * from ecommerce.users order by id desc limit 1");
            $stmt->execute();
            return $stmt->fetchObject("User");
        } else {
            throw new PDOException("Errore Nella Creazione");
        }
    }

    public function UpdateCart_ID($cartID)
    {
        $id = self::getID();
        $pdo = self::Connect();
        $stmt = $pdo->prepare("UPDATE ecommerce.users SET cart_id = :cartID WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":cartID", $cartID);

        if ($stmt->execute()) {
            $userId = self::getID();  //userid mi serve solo per metterci dentro il getid e fare il confronto
            $user = self::Find($userId);
            return $user;
        } else {
            throw new PDOException("Errore nel aggiornamento");
        }
    }

    public function getCartItems($current_user)
    {
        $pdo = self::Connect();
        $cartId = $current_user->getCart_ID();
        $stmt = $pdo->prepare("SELECT * FROM ecommerce.cart_products WHERE cart_id = :cart_id");
        $stmt->bindParam(":cart_id", $cartId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Cart');
    }

    public static function Connect()
    {
        return DbManager::Connect("ecommerce");
    }
}
