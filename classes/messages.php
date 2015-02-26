<?php
include_once "connectDb.php";
class messages{
    private $message;
    private $id_user;
    private $id_theme;
    private $mysqli;

    function __construct($message, $id_theme,  $id_user){
        $this->message = $message;
        $this->id_theme = $id_theme;
        $this->id_user = $id_user;

    }

    function saveMessage(){
        $this->mysqli = connectDb::getInstance();
        $date = date('Y-m-d');
        $time = date('H:i:s');


        $query = "INSERT INTO messages(
                                message,
                                id_theme,
                                id_user,
                                date,
                                time
                        )
                        VALUES (
                              '$this->message',
                               $this->id_theme,
                               $this->id_user,
                              '$date',
                              '$time'
                        )";
        $result = $this->mysqli->query($query);

        header("location: /index.php?themeid=".$this->id_theme);
    }
}