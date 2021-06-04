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
        $dbh = getDBConnection();

        $query = '  SELECT pseudo, content, date  
                    FROM (
                        SELECT pseudo, content, date  
                        FROM message
                        ORDER BY `date` DESC LIMIT 5
                        ) AS req1
                    ORDER BY `date` ASC';
    
        $req = $dbh->query($query);
        $req ->setFetchMode(PDO::FETCH_ASSOC);
        $messages = $req->fetchAll();
        $req ->closeCursor();
    
        $dbh = null;

        return $messages;
    
    // echo 'End of Request !';
    } catch (PDOException $e) {
        print "Error !: " . $e->getMessage() . "<br/>";
        die();
    }
}



function insertData(array $post)
{
    if($post !== []){
        // SQL Insert
        try {
            if(($post['pseudo'] !== '') && ($post['content'] !== '')){
                $dbh = getDBConnection();

                $query = 'INSERT INTO message (pseudo, content) VALUES (:pseudoVal, :contentVal)';
    
                $req = $dbh->prepare($query);
                $req -> bindValue(':pseudoVal', $post['pseudo'], PDO::PARAM_STR);
                $req -> bindValue(':contentVal', $post['content'], PDO::PARAM_STR);
                $req->execute();
                $req ->closeCursor();

                $dbh = null;
            }
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}