<div class="container">
    <form method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationServer01">Имя</label>
                <input name="firstname" type="text" class="form-control" id="validationServer01"
                       value=""
                       placeholder="Имя" required>
                <div class="valid-feedback">
                    Отлично!
                </div>

            </div>
            <div class="col-md-4 mb-3">
                <label for="validationServer02">Фамилия</label>
                <input name="lastname" type="text" class="form-control" id="validationServer02"
                       value=""
                       placeholder="Фамилия" required>

            </div>
            <div class="col-md-4 mb-3">
                <label for="validationServerUsername">Пол</label>
                <div class="input-group">
                    <select name="gender" id="inputState" class="form-control" required>
                        <option value="">Выберите...</option>
                        <option value="male">Мужской
                        </option>
                        <option

                               value="female">Женский
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationServerUsername">Местоположение</label>
                <div class="form-group">
                    <select name="location" id="inputState" class="form-control" required>
                        <option value="">Выберите...</option>
                        <option value="resident">Местный
                        </option>
                        <option value="nonresident">Иногородний
                        </option>
                    </select>

                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer04">Сумма баллов ЕГЭ</label>
                <input name="points" type="text" class="form-control <?= '' ?>" id="validationServer04"
                       value=""
                       placeholder="Например: 205"
                       required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer05">Год рождения</label>
                <select name="year" id="inputStaOptions" class="form-control" required>
                    <option value="">Выберите...</option>
                    <?php \app\libs\Dev::years() ?>
                </select>

            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer05">Email:</label>
                <input name="email" type="email" class="form-control <?= '' ?>" id="validationServer05"
                       value=""
                       placeholder="example@mail.ru"
                       required>

            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer05">Номер группы:</label>
                <input name="groupnumber" type="text" class="form-control <?= '' ?>" id="validationServer05"
                       value=""
                       placeholder="Например: 1А7"
                       required>

            </div>
        </div>

        <button name="save" class="btn btn-primary"
                type="submit">Зарегистрироваться
        </button>
    </form>
</div>