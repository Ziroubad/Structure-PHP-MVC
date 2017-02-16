<?php
$db = new PDO('mysql:host=Localhost;dbname=ecommerce', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT title FROM products WHERE products.id = :id';
            $req = $db->prepare($sql);
            $res = $req->fetch(PDO::FETCH_OBJ);