<?php

function getDBConnection()
{
    $user = 'root';
    $pass = '';
    $dbname = 'chat';
    $host = 'localhost';
    
    
    // SQL Connection
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $dbh = new PDO($dsn, $user, $pass, $options);
    
        // echo 'connection done<br>';

        return $dbh;
    
    } catch (PDOException $e) {
        print "Error !: " . $e->getMessage() . "<br/>";
        die();
    }
}



function findAllData()
{
    try {
        $query = '  SELECT pseudo, content, date  
                    FROM message';
    
        $req = getDBConnection()->query($query);
        $req ->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $req->fetchAll();
        $req ->closeCursor();
    
        // echo 'query done <br>';
        $dbh = null;

        return $tab;
    
    // echo 'End of Request !';
    } catch (PDOException $e) {
        print "Error !: " . $e->getMessage() . "<br/>";
        die();
    }
}



function insertData()
{
    if($_POST !== []){
        // SQL Insert
        try {
            $query = 'INSERT INTO message (pseudo, content) VALUES (:vpseudo, :vcontent)';
    
            $req = getDBConnection()->prepare($query);
            $req->bindParam(':vpseudo', $pseudo);
            $req->bindParam(':vcontent', $content);
            
            // insertion d'une ligne
            $pseudo = $_POST['pseudo'];
            $content = $_POST['content'];
            $req->execute();
            $req ->closeCursor();
        
            $dbh = null;
    
            // echo 'insert done<br>';
            
            // echo 'End of Request !';
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}