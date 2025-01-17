<?php
session_start();
include "../core/function.php";

$id = $_GET['id'];


$file = fopen("../data/filepro.csv", 'r');
while ($row = fgets($file)) {

    $res = explode(',', $row);
    $name = $res[1];
    $salary = $res[2];


    if ($res[0] == $id) {


        $file = fopen("../data/filecart.csv", 'a');
        $data = [trim($id), trim($name), trim($salary)];
        fputcsv($file, $data);
        redirect("../index.php");
        fclose($file);
        die;

    }
}

fclose($file);
