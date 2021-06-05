<?php
// var_dump($_POST);
// echo '<br>';
// var_dump($_GET);
// echo '<br>';

require 'model/model.php';
require 'service/checkForm.php';

$errors=[];

if($_POST !== ''){
    $errors = checkForm($_POST);
    if($errors === []){
        insertData($_POST);
    }
}


if (isset($_GET['id'])) {
    deleteData($_GET);
    $_POST['pseudo'] = $_GET['pseudo'];
}

$messages = findAllData();

require 'view/default.php';