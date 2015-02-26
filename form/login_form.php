<?php

class login_form{

    public function form_html(){
        ?>
    <div class="container-fluid" id="login_form">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-7">
                <form class="form-inline" action="/helpers/users/auth_user.php" method="post">
                    <div class="form-group pull-right">
                        <input type="text" class="form-control input-sm" name="login" placeholder="login">
                        <input type="password" class="form-control input-sm" name="password" placeholder="password">
                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-link" id="register_link" data-toggle="modal" data-target="#exampleModal">Зарегистрироваться</button>
<?php
    }

}