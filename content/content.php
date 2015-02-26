<?php
include "/classes/content.php";
if(isset($_GET['theme'])){
    $addtheme = htmlspecialchars($_GET['theme']);
    if(isset($_SESSION['auth']) and $_SESSION['auth'] = true and isset($_SESSION['login']) and $_SESSION['login'] == true){
        $add_theme_form = new add_theme_form();
        $add_theme_form->add_theme();
    }else{
        ?>
        <h3 id="required_registration">Вам необходимо <a href="#" data-toggle="modal" data-target="#exampleModal">Зарегистрироваться</a> или зайти под своим логином</h3>
<?php
    }
}
if(empty($_GET)){
    $index = new content();
    $index->fetchAllThemes();
    $index->linkThemes();
}

if(isset($_GET['themeid'])){
    $id = htmlspecialchars($_GET['themeid']);

    $messages = new content();
    $messages->fetchAllMessages($id);
    $messages->linkMessages();

    if(isset($_SESSION['login']) and $_SESSION['login'] == true) {
        $add_message = new add_message_form();
        $add_message->add_message();
    }else{
        echo "<h3>Что бы добавить сообщение, необходимо <a href='#' data-toggle='modal' data-target='#exampleModal'>Зарегистрироваться</a> или зайти под своим логином</h3>";
    }
}



