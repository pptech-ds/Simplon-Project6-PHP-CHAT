<?php
// var_dump($_POST);
// echo '<br>';


require 'model/model.php';

insertData();
$tab = findAllData();

// var_dump($tab);
// echo '<br>';

require 'view/default.php';


?>