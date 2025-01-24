<?php
include "../core/function.php" ;
include "../core/validation.php" ;


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
        $errors[] = "email be repaired" ;
    }elseif(!emailVal($email)){
        $errors[] = "please type a valid email" ;
    }
    //address : require   , min   , max
    if(!requireVal($address)){
        $errors[] = "address be repaired" ;
    }elseif(!minVal($address , 50)){
        $errors[] = "address must be greater than 50 chares" ;
    }
    elseif(!maxVal($address , 200)){
        $errors[] = "address must be smaller than 200 chares" ;
    }
    //phone : require   , size
    if(!requireVal($phone)){
        $errors[] = "phone be repaired" ;
    }elseif($phone == 11){
        $errors[] = "address must be greater than 11 chares" ;
    }
    
    
    //chick errors
    if (empty($errors)) {
        $file = fopen("../data/users.csv", "r");
        while ($res = fgets($file)) {
            $row = explode(',', $res);
            if ($row[1] == trim($email)) {
                
                $chick_email = true ;
                //redirect 
                $_SESSION['success'] = "تم الدفع بنجاح";
                redirect('../checkout.php');
                die;
            }else{
                $chick_email = false ;
            }
        }
        if($chick_email == false){
            
            $errors[] = "error email" ;
            $_SESSION['errors'] = $errors;
            redirect("../checkout.php");
            
        }
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../checkout.php");
        die;
    }











}