<?php

class add_theme_form{

    public function add_theme(){
        ?>
        <div class="container" id="add_theme">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-3">
                    <form action="/helpers/themes/add_themes.php" method="post">
                        <div class="form-group">
                            <label for="title_theme">Название темы</label>
                            <input type="text" id="title_theme" class="form-control" name="title_theme">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea rows="8" id="message" class="form-control" name="message"></textarea>
                            <button type="submit" class="btn btn-primary btn-lg col-lg-12 col-xs-12" id="button_add_theme" name="submit">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}