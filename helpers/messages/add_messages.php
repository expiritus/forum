<?php
session_start();
include "../../classes/messages.php";
include "../../classes/users.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['message'])){
        $message = htmlspecialchars($_POST['message']);
    }

    if(isset($_POST['theme_id'])){
        $id_theme = htmlspecialchars($_POST['theme_id']);
    }

    if(isset($message) and isset($id_theme)){
        $id_user = $_SESSION['id'];
        $message = new messages($message, $id_theme, $id_user);
        $message->saveMessage();
    }
}