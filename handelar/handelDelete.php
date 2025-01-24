<?php 
include "../core/function.php" ;
$id = $_GET['id'] ;
$lines = [] ;
$file = fopen('../data/filecart.csv' , 'r') ;
while($line = fgets($file)){
    $res = explode(',' , $line) ;
    echo $res[0] ;
    if($id  == $res[0]){
        
    }else{
        $lines[] = $line ;
    }
}
fclose($file) ;
$file = fopen('../data/filecart.csv' , 'w') ;
foreach($lines as $line){
    fwrite($file , $line) ;
}
fclose($file) ;
redirect('../cart.php') ;