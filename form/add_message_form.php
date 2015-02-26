<?php

class add_message_form{

    public function add_message(){
        if(isset($_GET['themeid'])){
            $id_theme = htmlspecialchars($_GET['themeid']);
        }
        ?>
        <div class="container" id="add_theme">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="/helpers/messages/add_messages.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="theme_id" value="<?php echo $id_theme; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <span id="label"><label for="message">Сообщение</label></span>
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