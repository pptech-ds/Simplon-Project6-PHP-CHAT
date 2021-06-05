<?php 

function checkForm(array $post) :array
{
    $errors = [];

    foreach($post as $key => $val){
        if(($key === 'content') && ($val === '')){
            $errors[] = 'Un message doit etre rentré';
        }

        if(($key === 'pseudo') && ($val === '')){
            $errors[] = 'Le peudo doit etre rentré';
        }
    }

    return $errors;
}