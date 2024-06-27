<?php
    require 'Model/model.php';
    class Controller{
        private function modelObj(){
            $model = new Model();
        }
        
        public function login(){
            require 'View/home.html';
            
        }


    }
?>