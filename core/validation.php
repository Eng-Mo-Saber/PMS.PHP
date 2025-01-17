<?php 


function requireVal($input){
    if(empty($input)){
        return false ;
    }
    return true ;
}


function minVal($input , $len){
    if(strlen($input) < $len){
        return false ;
    }
    return true ;
}


function maxVal($input , $len){
    if(strlen($input) > $len){
        return false ;
    }
    return true ;
}

function emailVal($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false ;
    }
    return true ;
}