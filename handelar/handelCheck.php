<?php
include "../core/function.php";
include "../core/validation.php";
session_start();
$errors = [];
$idc = $_GET['id'] ;

if (chickRequestMethod("POST")) {

    $quantity = sanitizeInput($_POST['quantity']);


    //validation 
    //price: require   , min   , max
    if (!requireVal($quantity)) {
        $errors[] = "quantity be repaired";
    } elseif (!minVal($quantity, 1)) {
        $errors[] = "quantity must be greater than 1 chares";
    } elseif (!maxVal($quantity, 1)) {
        $errors[] = "quantity must be smaller than 1 chares";
    }
    //chick errors

    if (empty($errors)) {
        
        //redirect
        $_SESSION['quantity'] = $quantity;
        $_SESSION['idc'] = $idc;
        redirect("../cart.php");
        die;
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../cart.php");
        die;
    }
}
