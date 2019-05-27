<div class="container">
    <div class="row justify-content-center">
        <form action="?" method="post">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Email:</label>
                <input type="text" name="email" class="form-control" id="validationServer01" placeholder="Email" value="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Password:</label>
                <input type="text" name="password" class="form-control" id="validationServer01" placeholder="Password" value=""
                       required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <a href="/user/register">Зарегистрироваться</a>
            </div>
            <div class="col-md-12 mb-3">
            <div class="form-check mb-3">
                <input name="checked" class="form-check-input <?= '' ?>" type="checkbox" value="" id="invalidCheck3"
                       required>
                <label class="form-check-label" for="invalidCheck3">
                    Запомнить
                </label>
            </div>
            <div class="col-md-12 mb-3 text-center">

            <input class="btn btn-primary" name="submit" type="submit" value="Вход">
            </div>
        </form>
    </div>
</div>