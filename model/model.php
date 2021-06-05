<?php

function getDBConnection() :PDO
{
    $user = 'root';
    $pass = '';
    $dbname = 'chat';
    $host = 'localhost';

    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $dbh = new PDO($dsn, $user, $pass, $options);

        return $dbh;
        
    } catch (PDOException $e) {
        print 'Error !: ' . $e->getMessage() . '<br/>';
        die();
    }
}


function findAllData() :array
{
    try {
        $dbh = getDBConnection();

        $query = '  SELECT *  
                    FROM (
                        SELECT *  
                        FROM message
                        ORDER BY `date` DESC LIMIT 10
                        ) AS req1
                    ORDER BY `date` ASC';

        $req = $dbh->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $messages = $req->fetchAll();
        $req->closeCursor();

        $dbh = null;

        return $messages;

    } catch (PDOException $e) {
        print 'Error !: ' . $e->getMessage() . '<br/>';
        die();
    }
}


function insertData(array $post) : void
{
    if ($post !== []) {
        // SQL Insert
        try {
            if ($post['pseudo'] !== '' && $post['content'] !== '') {
                $dbh = getDBConnection();

                $query = 'INSERT INTO message (pseudo, content) VALUES (:pseudoVal, :contentVal)';

                $req = $dbh->prepare($query);
                $req->bindValue(':pseudoVal', $post['pseudo'], PDO::PARAM_STR);
                $req->bindValue(':contentVal', $post['content'], PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();

                $dbh = null;
            }
        } catch (PDOException $e) {
            print 'Error !: ' . $e->getMessage() . '<br/>';
            die();
        }
    }
}


function deleteData(array $get): void
{
    if ($get !== []) {
        try {
            if ($get['id'] !== '') {
                $dbh = getDBConnection();

                $query = 'DELETE FROM message WHERE id = :idVal';

                $req = $dbh->prepare($query);
                $req->bindValue(':idVal', $get['id'], PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();

                $dbh = null;
            }
        } catch (PDOException $e) {
            print 'Error !: ' . $e->getMessage() . '<br/>';
            die();
        }
    }
}