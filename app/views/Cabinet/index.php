
<section>
    <div class="container">


            <h1 style="font-size: 30px;">Кабинет пользователя</h1>

            <h3><?=(isset($vars['name'])) ? "Добро пожаловать, {$vars['name']}!" : '';?></h3>

            <ul  style="
            list-style: none;">
                <li><a style="color: #000;" href="/cabinet/edit">Редактировать данные</a></li>
                <li><a style="color: #000 !important;" href="/cabinet/delete">Удалить абитуриента</a></li>
            </ul>


    </div>
</section>