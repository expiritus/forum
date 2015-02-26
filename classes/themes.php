<?php
include_once "connectDb.php";
class themes{
    private $title_theme;
    private $message;
    private $id_user;
    private $mysqli;

    function __construct($title_theme, $message, $id_user){
        $this->title_theme = $title_theme;
        $this->id_user = $id_user;
        $this->message = $message;
    }

    function saveTheme(){
        $this->mysqli = connectDb::getInstance();
        $date = date('Y-m-d');
        $time = date('H:i:s');


        $query = "INSERT INTO themes(
                                title_theme,
                                id_user,
                                date,
                                time
                        )
                        VALUES (
                              '$this->title_theme',
                               $this->id_user,
                              '$date',
                              '$time'
                        )";
        $result = $this->mysqli->query($query);

        $query = "SELECT id FROM themes ORDER BY id DESC limit 1";
        $result = $this->mysqli->query($query);
        $id_theme = $result->fetch(PDO::FETCH_COLUMN);
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $query = "INSERT INTO messages(
                                message,
                                id_theme,
                                id_user,
                                date,
                                time
                                )
                        VALUES(
                              '$this->message',
                              $id_theme,
                              $this->id_user,
                              '$date',
                              '$time'
            ) ";
        $result = $this->mysqli->query($query);
        header("location: /index.php");
    }
}