<?php


class Secure {
    public static function Session(){
        session_start();
        if(!isset($_SESSION['isLogged'])) {
            header('Location: login.php');
        }
    }
}