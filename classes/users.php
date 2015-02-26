<?php
session_start();
include_once "connectDb.php";

class users{
    private $name;
    private $surname;
    private $login;
    private $email;
    private $password;
    private $date;
    private $time;
    private $file;
    private static $mysqli;
    static $data_array = array();

    public function __construct($name, $surname, $login, $email, $file, $password, $date, $time){
        $this->name = $name;
        $this->surname = $surname;
        $this->login = $login;
        $this->email = $email;
        $this->file = $file;
        $this->password = md5($password);
        $this->date = $date;
        $this->time = $time;
    }

    //Метод для сохранения нововго пользователя в базу
    public function saveUser(){
        $this->mysqli = connectDb::getInstance();

        $query = "INSERT INTO users(
                                  name,
                                  surname,
                                  login,
                                  email,
                                  filename,
                                  password,
                                  date,
                                  time
                          ) VALUES (
                                  '$this->name',
                                  '$this->surname',
                                  '$this->login',
                                  '$this->email',
                                  '$this->file',
                                  '$this->password',
                                  '$this->date',
                                  '$this->time'
                          )";
        $result = $this->mysqli->query($query);
    }


    //Аутентификация пользователя
    public static function authUser($login, $password){
        self::$mysqli = connectDb::getInstance();

        $query = "SELECT id, login, password FROM users WHERE login = '$login'";
        $result = self::$mysqli->query($query);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            self::$data_array['id'] = $row['id'];
            self::$data_array['login'] = $row['login'];
            self::$data_array['password'] = $row['password'];
        }
        if(self::$data_array['login'] == $login and self::$data_array['password'] == md5($password)){
            $_SESSION['user'] = $login;
            $_SESSION['login'] = true;
            $_SESSION['auth'] = true;
            $_SESSION['id'] = self::$data_array['id'];
            header("location: /index.php");
        }else{
            $_SESSION['login'] = false;
            $_SESSION['auth'] = false;
            header("location: /index.php");
        }

    }

    public static function logOut(){
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
        unset($_SESSION['login']);
        header("location: /index.php");
    }
}