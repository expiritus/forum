<?php
include_once "connectDb.php";
class content{
    private $mysqli;
    public $themes = array();
    public $messages = array();

    public function fetchAllThemes(){
        $this->mysqli = connectDb::getInstance();
        $query = "SELECT * FROM themes";
        $result = $this->mysqli->query($query);
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $this->themes[$i]['title_theme'] = $row['title_theme'];
            $this->themes[$i]['id'] = $row['id'];
            $i++;
        }
    }

    public function linkThemes(){

        echo "<table class='table' id='theme_table'>";
        foreach($this->themes as $theme){

            echo "<tr>";
            echo "<td class='info'>";
            echo "<img src='../images/message.png'>";
            echo "</td>";
            echo "<td>";
            echo '<a href="../index.php?themeid='.$theme['id'].'">'.$theme['title_theme']."</a><br>";
            echo "</td>";
            echo "</tr>";


        }
        echo "</table>";

    }

    public function fetchAllMessages($id){
        $this->mysqli = connectDb::getInstance();
        $query = "SELECT users.login,
                          users.filename,
                            themes.title_theme,
                              messages.message,
                                messages.date,
                                  messages.time
                    FROM users
                      JOIN themes
                        JOIN messages
                          WHERE users.id = messages.id_user
                            and themes.id = messages.id_theme
                              and themes.id = $id
                                ORDER BY messages.id";
        $result = $this->mysqli->query($query);
        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $this->messages[$i]['login'] = $row['login'];
            $this->messages[$i]['filename'] = $row['filename'];
            $this->messages[$i]['message'] = $row['message'];
            $this->messages[$i]['date'] = $row['date'];
            $this->messages[$i]['time'] = $row['time'];
            $i++;
        }
    }

    public function linkMessages(){
        foreach($this->messages as $message){
            echo "<div class='row' id='container'>";
            echo "<div class='col-lg-2 col-xs-3' id='avatar'>";
            echo "<div class='row'>";
            echo "<div class='col-lg-12 col-xs-12'>";
            echo "<img id='avatar_img' src='/user_files/".$message['filename']."'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-lg-12 col-xs-12' id='login'>";
            echo $message['login'];
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-lg-10 col-xs-9' id='message'>";
            $originalDate = $message['date'];
            $newDate = date("d-m-Y", strtotime($originalDate));
            echo "<span class='datetime'>#".$newDate."</span>";
            echo "<span class='datetime'>".$message['time']."</span><br>";
            echo $message['message'];
            echo "</div>";
            echo "</div>";
        }
    }
}