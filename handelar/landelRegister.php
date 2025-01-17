<?php 
include "../core/function.php";
include "../core/validation.php";

session_start();
$errors = [];
if(chickRequestMethod("POST")){
    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }


    //validation 
    //name : require   , min   , max
    if(!requireVal($name)){
        $errors[] = "name be repaired" ;
    }elseif(!minVal($name , 3)){
        $errors[] = "name must be greater than 3 chares" ;
    }
    elseif(!maxVal($name , 20)){
        $errors[] = "name must be smaller than 20 chares" ;
    }
    //gmail : require   , is email
    if(!requireVal($email)){
        $errors[] = "name be repaired" ;
    }elseif(!emailVal($email)){
        $errors[] = "please type a valid email" ;
    }

    //password : require   , min   , max
    if(!requireVal($password)){
        $errors[] = "password be repaired" ;
    }elseif(!minVal($password , 6)){
        $errors[] = "password must be greater than 6 chares" ;
    }
    elseif(!maxVal($password , 15)){
        $errors[] = "name must be smaller than 15 chares" ;
    }

    //chick errors

    if(empty($errors)){
        $file = fopen("../data/users.csv" , 'a+');
        $data = [$name , $email , trim(sha1($password)) ];
        fputcsv($file , $data) ;

        //redirect
        $_SESSION['auth'] = [$name , $email] ;
        redirect("../index.php") ;
        die;

    }else{
        $_SESSION['errors'] = $errors ;
        redirect("../register.php") ;
        die ;
    }






}else{
    echo "not supported method"; 
}