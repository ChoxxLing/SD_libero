<?php
    require 'Config/_database.php';

        class Model{
            public function __construct(){
                $this->conn = connectDB();
        }


    }
?>