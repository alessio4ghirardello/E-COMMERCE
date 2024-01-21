<?php

require_once __DIR__ . "/../connection/DbManager.php";

class Cart
{
    private $id;
    private $product_id;
    private $quantita;
    private $cart_id;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function getQuantita()
    {
        return $this->quantita;
    }

    public function setQuantita($quantita)
    {
        $this->quantita = $quantita;
    }


    public function getCartId()
    {
        return $this->cart_id;
    }

    public function setCartId($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    public function AddProducts($params)
    {
        try {
            $pdo = self::Connect();
            $cartId = $this->getId();

            $stmt = $pdo->prepare("INSERT INTO ecommerce.cart_products (cart_id, product_id, quantita) VALUES (:cartID, :productID, :quantita)");
            $stmt->bindParam(":cartID", $cartId);
            $stmt->bindParam(":productID", $params['product_id']);
            $stmt->bindParam(":quantita", $params['quantita']);

            if ($stmt->execute()) {
                return $cartId;
            } else {
                throw new PDOException("Errore nell'aggiunta al carrello dei prodotti");
            }
        } catch (PDOException $e) {

            return false;
        }
    }

    public static function Create($user_id)
    {
        $pdo = self::Connect();
        $stmt = $pdo->prepare("INSERT INTO ecommerce.carts (user_id) values (:user_id)");
        $stmt->bindParam(":user_id", $user_id);
        return $stmt->execute();
    }


    public function save()
    {
        $cart_id = $this->getCartId();
        $product_id = $this->getProductId();
        $quantita = $this->getQuantita();
        $pdo = self::Connect();
        $stmt = $pdo->prepare("UPDATE ecommerce.cart_products SET quantita = :quantita WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(":cart_id", $cart_id);
        $stmt->bindParam(":product_id", $product_id);
        $stmt->bindParam(":quantita", $quantita);

        return $stmt->execute();
    }

    public function Find()
    {
        $pdo = self::Connect();
        $cart_id = $this->getId();
        $stmt = $pdo->prepare("SELECT * FROM ecommerce.cart_products WHERE cart_id=:cart_id");
        $stmt->bindParam(":cart_id", $cart_id);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_CLASS,'Cart');
    }

    public static function FindByUser($user_id)
    {
        $pdo = self::Connect();
        $stmt = $pdo->prepare("SELECT * FROM ecommerce.carts WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt->fetchObject('Cart');
    }

    public static function Connect()
    {
        return DbManager::Connect("ecommerce");
    }
}

?>
