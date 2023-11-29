<?php
    session_start();
    try {   
        $connection = new PDO("mysql:host=localhost;dbname=shopkz;", "root", "");
    }
    catch (Exception $e) {
        echo "<h4 style='color:red';>" .$e->getMessage(). "</h4>";
    }

    function getAllItems(){
        global $connection;

        $query = $connection->prepare("
            SELECT p.id, p.name, p.price, p.amount, p.country_id, p.category, p.details, c.name as country_name, c.code 
            FROM products p 
            INNER JOIN countries c ON p.country_id = c.id;
        ");
        
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllCountries(){
        global $connection;

        $query = $connection->prepare("
            SELECT * FROM countries
        ");

        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getItem($id){
        global $connection;

        $query = $connection->prepare("
            SELECT p.id, p.name, p.price, p.amount, p.category, p.details, c.name as country_name, c.code 
            FROM products p
            INNER JOIN countries c ON p.country_id = c.id
            WHERE p.id = $id
        ");

        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function addItem($name, $price, $amount, $countryId, $details){
        global $connection;
        $category = "simple";

        if  ($price >= 300000){   
            $category = "top";
        }else if ($price >= 100000){
            $category = "middle";
        } else $category="simple";
        
        $query = $connection->prepare("
            INSERT INTO products (id, name, price, amount, country_id, category, details)
            VALUES (NULL, :n, :p, :a, :cnt_id,  :c, :d)
        ");

        $query->execute(array("n"=> $name,"p"=> $price,"a"=> $amount, "cnt_id"=>$countryId, "c"=> $category, "d"=>$details));
    }

    function editItem($name, $price, $amount, $id, $details){  
        global $connection;
        $category = "simple";

        if  ($price >= 300000){   
            $category = "top";
        }else if ($price >= 100000){
            $category = "middle";
        } else $category="simple";

        $query = $connection -> prepare("
            UPDATE products SET name = :name, price = :price, amount = :amount, details = :details, category = :category
            WHERE id = :ids
        ");
        $query->execute(["name"=>$name, "price"=>$price, "amount"=>$amount, "ids"=>$id, "details"=>$details, "category"=>$category]);
        return true;
    }

    function deleteItem($id){
        global $connection;
        $query = $connection -> prepare("
            DELETE FROM products WHERE id = $id
        ");
        $query->execute();
        return true;
    }

    function addUser($name, $lastname, $login, $password){
        global $connection;
        $role = 'user';
        $query = $connection -> prepare("
            INSERT INTO users (name, lastname, login, password, role)
            VALUES (:n, :ln, :l, :p, :role)
        ");
        try{
            $query->execute(["n"=>$name, "ln"=>$lastname, "l"=>$login,"p"=>$password, "role"=>$role]);
        }catch(PDOException $e){
            return false;
        }
        return true;
    }

    function checkUser($login, $password){
        global $connection;
        $query = $connection -> prepare("
            SELECT * FROM users WHERE login = :login and password = :pass
        ");
        $query->execute(["login"=>$login,"pass"=>$password]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function changePassword($password, $id){
        global $connection;
        $query = $connection->prepare("
                UPDATE users SET password = :pass WHERE id = :id 
            ");
        $query->execute(['pass'=>$password, 'id'=>$id]);
        return true;
    }

    function addToBucket($itemId, $userId, $amount){
        global $connection;
        $checkItem = $connection->prepare("
                SELECT * FROM products WHERE id = :id and amount >= :amount
            ");
        $checkItem->execute(['id'=>$itemId, 'amount'=>$amount]);
        $availableItem = $checkItem->fetch();
        if($availableItem != null){
            $checkBucket = $connection->prepare("
                    SELECT * FROM bucket WHERE item_id = :id and user_id = :user_id
                ");
            $checkBucket->execute(['id'=>$itemId, 'user_id'=>$userId]);
            $bucketItem = $checkBucket->fetch();
            if($bucketItem != null){
                $updateBucket = $connection->prepare("
                        UPDATE bucket SET amount = amount + :amount 
                        WHERE item_id = :item_id and user_id = :user_id
                    ");
                $updateBucket->execute(['amount'=>$amount, 'item_id'=>$itemId, 'user_id'=>$userId]);
            }else {
                $addToBucket = $connection->prepare('
                        INSERT INTO bucket (item_id, user_id, amount)
                        VALUES (?,?,?)
                    ');
                $addToBucket->execute([$itemId, $userId, $amount]);
            }
            $updateProducts = $connection->PREPARE("
                    UPDATE products SET amount = amount - :amount
                    WHERE id = :id
                ");
            $updateProducts->execute(['amount'=>$amount, 'id'=>$itemId]);
            return true; 
        } else return false;
    }

    function getAllFromBucket($user_id){
        global $connection;
        $query = $connection->prepare("
                SELECT p.name, p.price, b.amount, p.price * b.amount as cost , b.user_id 
                FROM bucket b 
                INNER JOIN products p ON p.id = b.item_id 
                WHERE user_id = :user_id
            ");
        $query->execute(['user_id'=>$user_id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

?>