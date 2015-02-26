<?php
session_start();
function __autoload($className){
    include_once "/form/$className.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid" id="main_container">


    <header>
        <img id="head_image" src="images/head_image.jpg">
    </header>

    <!-- Навигация -->
    <div class="container-fluid">
        <div class="row">
            <div class="navbar navbar-my" id="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                            <span class="sr-only">Открыть навигацию</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul>
                            <li><a class="navbar-brand" href="index.php">Главная</a></li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="responsive-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Пункт1</a></li>
                            <li><a href="#">Пункт2</a></li>
                            <li><a href="#">Пункт3</a></li>
                            <li><a href="#">Пункт4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- конец навигация -->


    <!-- Приветствие пользователя -->
    <?php
    if(isset($_SESSION['user'])){
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-7">
                <div class="pull-right registered_user">
                    <form action='/helpers/users/auth_user.php' method='POST'>
                        <h3><?php echo "Здравствуйте, ". $_SESSION['user']." !"; ?></h3>
                        <button type='submit' class='btn btn-primary  col-lg-12 col-xs-12' name='exit' id="exit">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Конец приветствия пользователя -->

    <?php
    }else{

    //Форма логина

        $login_form = new login_form();
        $login_form->form_html();
    }

    //Конец формы логина



    //Выводится если логин/пароль введены неправильно
    if(isset($_SESSION['login']) and $_SESSION['login'] == false){
    ?>
        <h3 id="error_login">Неверный логин/пароль</h3>
    <?php
        if($_SERVER['REQUEST_URI'] == '/index.php'){
            unset($_SESSION['login']);
        }
    }

    ?>



    <!-- Форма регистрации -->
    <?php
        $registration_form = new registration_form();
        $registration_form->reg_form_html();
    ?>
    <!-- Конец формы регистрации -->


    <a id="add_theme" href="index.php?theme=add_theme">Добавить тему</a>

    <!-- Основной контент -->
    <div id="content">
        <?php
        include "/content/content.php";
        ?>
    </div>
    <!-- Основной контент -->





    <footer>
        <p>Супер пупер мега вебмастеринг&copy; <?php echo date('Y'); ?></p>
    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/bootstrap/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('#error_confirm_password').hide();
        $('#submit_button').on('click',function(){
            $('button[type="submit"]#submit_button').attr('type','button');
            var pass = $('.password').val();
            var confirm_pass = $('.confirm_password').val();
            if(pass == confirm_pass){
                $('button[type="button"]#submit_button').attr('type','submit');
            }else{
                $('#error_confirm_password').fadeIn().css({'color': 'red'});
                $('.confirm_password').select();
            }
        });
        $('#error_login').hide().fadeIn().css({'color': 'red'});
    });
</script>
</body>
</html>