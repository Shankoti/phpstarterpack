<?php

$heading = "Create a new note";

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors=[];
    if(strlen($_POST['body'])==0){
        $errors['body'] = 'Can not create an empty note';
    }


    if(strlen($_POST['body']) >1000){
        $errors['body'] = 'can not add a note with more than 1000 characters';
    }

    if(empty($errors)){
        
        $db->query(
            'INSERT INTO `notes` (`body`, `user_id`)
             VALUES (:body , :user_id)',
            [
            'body'=> $_POST['body'],
            'user_id'=> $_SESSION['user']['id']
            ]);
    
    }

}

// dd($_POST['body']);

require "views/note-create.view.php";