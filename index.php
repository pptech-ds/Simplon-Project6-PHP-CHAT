<?php
// var_dump($_POST);

require 'model/model.php';

$tab = findAllData();
insertData();

require 'view/default.php';


?>