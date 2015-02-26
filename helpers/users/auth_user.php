<?php
include "../../classes/users.php";

//Обработчик формы аутентификации пользователя
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['login'])){
        $login = htmlspecialchars($_POST['login']);
    }

    if(isset($_POST['password'])){
        $password = htmlspecialchars($_POST['password']);
    }

    if(isset($login) and isset($password)){
        //Вызывае метод подтверждающий аутентификацию пользователя
        users::authUser($login, $password);
    }

    if(isset($_POST['exit'])){
        users::logOut();
    }
}