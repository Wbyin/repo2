<?php
        try{
            // echo "<pre>";
            $host = 'localhost';
            $dbname = 'mess';
            $user = 'root';
            $pass = 'root';

            @$pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
            /* $sql = "select * from mess_user";
            $stmt = $pdo->query($sql);
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($list); */
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        










?>