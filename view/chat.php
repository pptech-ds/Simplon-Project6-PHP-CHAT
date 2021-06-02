<?php
$user = 'root';
$pass = '';
$dbname = 'chat';
$host = 'localhost';

try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO($dsn, $user, $pass, $options);
    // echo 'connection done <br>';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}

try {
    $query = '  SELECT id, pseudo, content, date  
                FROM message';

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();

    // echo 'query done <br>';

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2" hidden>date</th>
            <th scope="col" class="col-2" hidden>pseudo</th>
            <th scope="col" class="col-8" hidden>message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($tab as $num => $row) {
        ?>
            <tr class="table-light">
                <td class="col-2"><?= $row['date'] ?></td>
                <td class="col-2"><?= $row['pseudo'] ?></td>
                <td class="col-8"><?= $row['content'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php

    
$dbh = null;
    
// echo 'End of Request !';
} catch (PDOException $e) {
print "Error !: " . $e->getMessage() . "<br/>";
die();
}
?>