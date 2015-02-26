<?php

class registration_form{

    public function reg_form_html(){
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Форма регистрации</h4>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="f" action="/helpers/users/save_user.php" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Имя:</label>
                                <input type="text" class="form-control" id="recipient-name" name="name" required="true">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Фамилия:</label>
                                <input type="text" class="form-control" id="recipient-name" name="surname" required="true">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Логин:</label>
                                <input type="text" class="form-control" id="recipient-name" name="login" required="true">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Email:</label>
                                <input type="email" class="form-control" id="recipient-name" name="email" required="true">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Фото:</label>
                                <input type="file" id="recipient-name" name="userfile">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Пароль:</label>
                                <input type="password" class="form-control password" id="recipient-name" name="password" required="true">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Пароль еще раз:</label>
                                <input type="password" class="form-control confirm_password" id="recipient-name" name="confirm_password" required="true">
                                <span id="error_confirm_password">Пароли не совпадают</span>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button form="f" type="submit" class="btn btn-primary" id="submit_button">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
<?php

    }

}