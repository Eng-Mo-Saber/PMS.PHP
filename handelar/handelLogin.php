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
    $chick_email = true ;
    $chick_pass = true ;

    if (empty($errors)) {

        $file = fopen("../data/users.csv", "r");
        while ($res = fgets($file)) {
            $row = explode(',', $res);


            $pass = trim(sha1($password));
            $u_pass = trim($row[2]);
            if ($row[1] == $email2) {

                if ($pass == $u_pass) {
                    //redirect 
                    $_SESSION['auth'] = [$row[0], $row[1]];
                    redirect('../index.php');
                    die ;
                }else{
                    $chick_pass = false ;
                }
            }else{
                $chick_email = false;
            }
        }
        if($chick_email == false){
            
            $errors[] = "error email" ;
            $_SESSION['errors'] = $errors;
            redirect("../login.php");
            
        }
        if($chick_pass == false){
            
            $errors[] = "error pass" ;
            $_SESSION['errors'] = $errors;
            redirect("../login.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../login.php");
        die;
    }






}else{
    echo "not supported method"; 
}