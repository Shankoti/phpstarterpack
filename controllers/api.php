<?php
header('Access-Control-Allow-Origin: *');
/*
const Http = new XMLHttpRequest();
const url='http://localhost:8888/api';
Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e) => {
  console.log(Http.responseText)
}
*/

if($_SERVER["REQUEST_METHOD"]=='POST'){
 echo json_encode($_POST);
}else{
    echo " its a get " ;
    echo( "id is".$_GET['id']);

    dd($_SERVER);
}
