<?php
include "../core/function.php";
include "../core/validation.php";

session_start();
$errors = [];
if (chickRequestMethod("POST")) {
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    //validation 
    //id : require   , متكرر ولا لا  
    if (!requireVal($id)) {
        $errors[] = "id be repaired";
    } elseif (!maxVal($id, 100)) {
        $errors[] = "id must be greater than 100 chares";
    } elseif (!minVal($id, 1)) {
        $errors[] = "id must be smaller than 1 chares";
    } else {

        $filePro = fopen("../data/filePro.csv", "r");
        while ($row = fgets($filePro)) {
            $res = explode(',' , $row);
            if ($res[0] == $id) {
                $errors[] = "id already exists";
            }
        }
        fclose($filePro);
    }

    //name : require   , min   , max
    if (!requireVal($name)) {
        $errors[] = "name be repaired";
    } elseif (!minVal($name, 3)) {
        $errors[] = "name must be greater than 3 chares";
    } elseif (!maxVal($name, 20)) {
        $errors[] = "name must be smaller than 20 chares";
    }
    //salary : require   , min   , max
    if (!requireVal($salary)) {
        $errors[] = "salary be repaired";
    } elseif ($salary < 50) {
        $errors[] = "salary must be greater than 1000 pawned and must be smaller than 50 pawned";
    }




    //chick errors

    if(empty($errors)){
        $file = fopen("../data/filePro.csv" , 'a+');
        $data = [trim($id) , trim($name) , trim($salary) ];
        fputcsv($file , $data) ;


        //redirect
        $_SESSION['auth'] = [$name , $salary] ;
        redirect("../index.php") ;
        die;


    }else{
        $_SESSION['errors'] = $errors ;
        redirect("../addProduct.php") ;
        die ;
    }




}
