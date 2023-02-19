<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function logout(){
    session_destroy();
    echo("test");
    header('Location: http://localhost:8888/');
}