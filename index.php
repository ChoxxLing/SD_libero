<?php 
    require 'Config/_config.php';
    require 'Controller/Controller.php';
    
    // print_r($_SERVER);
    connectDB();
    $con = new Controller();
    $con->login();

?>