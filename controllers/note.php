<?php

$heading = 'Note';
$config = require('config.php');
$db = new Database($config['database']);
$currentUserId = $_SESSION["user"]["id"] ;


if ($_SERVER['REQUEST_METHOD']=='POST'){
$db->query( 'DELETE FROM notes WHERE id =:id' ,[
    'id' => $_GET['id']
]);

}

$note = $db->query('SELECT * FROM notes WHERE  id=:id '  ,
    ['id' => $_GET['id']] )->fetch();
if(! $note){
    abort(404);
}
if ($note['user_id']!= $currentUserId){

    abort(403);
}
    
require "views/note.view.php";

