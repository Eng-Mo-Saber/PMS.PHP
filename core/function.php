<?php


function chickRequestMethod($method){
    if($_SERVER["REQUEST_METHOD" ] == $method){
        return true ;
    }else{
        return false ;
    }
}


function sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path){
    header("location:$path") ;
}