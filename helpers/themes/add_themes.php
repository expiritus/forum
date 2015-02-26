<?php
include "../../classes/themes.php";
include "../../classes/users.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['title_theme']) and !empty($_POST['title_theme'])){
        $title_theme = htmlspecialchars($_POST['title_theme']);
    }

    if(isset($_POST['message']) and !empty($_POST['message'])){
        $message = htmlspecialchars($_POST['message']);
    }

    if(isset($title_theme) and isset($message)){
        $id_user = $_SESSION['id'];
        $theme = new themes($title_theme, $message, $id_user);
        $theme->saveTheme();
    }else{
        header("location: ../../index.php");
    }
}