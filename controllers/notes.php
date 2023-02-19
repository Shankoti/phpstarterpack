<?php

$heading = 'Notes';
$config = require('config.php');
$db = new Database($config['database']);

$notes = empty($_SESSION) ? "" : $db->query('SELECT * FROM notes WHERE user_id = :id',["id"=>$_SESSION["user"]["id"]])->fetchAll();
require "views/notes.view.php";

