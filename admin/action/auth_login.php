<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$postData = $_POST;


$login = Autentication::log_in($postData['user_name'], $postData['password']);


if ($login){
    if($login == "client"){
        header('Location: ../../index.php?section=home');
    }else{
        header('Location: ../index.php?section=dashboard');
    }
} else {
    header('Location: ../index.php?section=login');

}