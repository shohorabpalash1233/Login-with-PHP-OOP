<?php 
	session_start();
    require_once 'functions.php';

    $user = new LoginRegistration();

    $user->logoutUser();
    header('Location: login.php?response=1');
    exit();
?>