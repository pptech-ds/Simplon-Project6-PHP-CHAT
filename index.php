<?php
// var_dump($_POST);



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

} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}



if($_POST !== []){
    // SQL Insert
    try {
        $query = 'INSERT INTO message (pseudo, content) VALUES (:vpseudo, :vcontent)';

        $req = $dbh->prepare($query);
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

require 'view/default.php';


?>