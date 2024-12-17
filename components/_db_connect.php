<?php 

    $localserver = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'securesystem';

    $connection = mysqli_connect($localserver , $username , $password , $database);

    if(isset($connection)){
       
    }
    else{
        echo "Not Connected" . mysqli_connect_error();
    }

    
?>