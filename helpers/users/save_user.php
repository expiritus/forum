<?php
include "../../classes/users.php";


//Обработчик формы регистрации.
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['name'])){
        $name = htmlspecialchars($_POST['name']);
    }

    if(isset($_POST['surname'])){
        $surname = htmlspecialchars($_POST['surname']);
    }

    if(isset($_POST['login'])){
        $login = htmlspecialchars($_POST['login']);
    }

    if(isset($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
    }

    if(isset($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
    }

    if(isset($_POST['confirm_password'])){
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
    }

    $path = '../../user_files';
    $file_name = uniqid();
    $userfile = $_FILES['userfile']['name'];
    $tmp_name = $_FILES['userfile']['tmp_name'];
    if(!empty($userfile)){
        $file = $path . '/' . $file_name . $userfile;
        $uploaded_file = move_uploaded_file($tmp_name, $file);
    }

    if(isset($userfile)){
        $save_file = $file_name . $userfile;
    }else{
        $save_file = null;
    }

    if(isset($password) and isset($confirm_password) and $password == $confirm_password){
        $_SESSION['login'] = true;
        $date = date('Y-m-d');
        $time = date('H:i:s');

        if(isset($name) and isset($surname) and isset($login) and isset($email) and isset($password)){
            $saveuser = new users($name, $surname, $login, $email, $save_file, $password, $date, $time);
            //Обращаемся к методу для сохранения пользователя в базе
            $saveuser->saveUser();
            header("location: ../../index.php");
        }
    }
}