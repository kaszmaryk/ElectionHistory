<div class="block parliament-title">
    <script src="js/regions_title.js"></script>
    <?php require_once("svg/regions-title.svg"); ?>
    <?php require_once("svg/seats23.svg"); ?>
</div>
<div class="block registration-title-m">
    <div class="registration-title">
        <h2>Регистрация</h2>
        <form class="regform" name="regform" action="" method="post" accept-charset="utf8_general_ci">
            <input name="LastNameField" type="text" placeholder="Фамилия"></br>
            <input name="FirstNameField" type="text" placeholder="Имя"></br>
            <input name="EmailField" type="email" placeholder="e-mail"></br>
            <input name="LoginField" type="text" placeholder="логин"></br>
            <input name="PasswordField" type="password" placeholder="пароль"></br>
            <button type="Submit" name="regSubmit" id="regSubmit" value="Submit">Зарегистрироваться</button>
        </form>
    </div>
</div>