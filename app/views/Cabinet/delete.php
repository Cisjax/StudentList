<div class="content-w3ls">
    <div class="content-bottom">
        <form method="post">
           <h2>Удаление аккаунта безвозвратно!</h2>
            <?=(isset($vars['errors']))?'Неверный пароль':''?>
            <div class="field-group">
                <span class="fa fa-lock" aria-hidden="true"></span>
                <div class="wthree-field">
                    <input name="password" id="myInput" type="Password" placeholder="Пароль">
                </div>
            </div>
            <div class="wthree-field">
                <button type="submit" name="submit" class="btn" value="Войти">Удалить</button>
            </div>
            <ul class="list-login">
                <li>
                    <a href="#" class="text-right">Забыл пароль?</a>
                </li>
                <li class="clearfix"></li>
        </form>
    </div>
</div>