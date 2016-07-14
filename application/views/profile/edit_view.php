<?php include("application/included/menu.php"); ?>
<div class="block main-info">
    <div class="profile-b-with-forms">
    <form id="changeMainInfo" name="changeMainInfo" action="" method="post" accept-charset="utf8_general_ci">
        <label><span class="profile-edit-input-s">Фамилия </span></span><input  name="LastName" type="text" value="<?php echo $user_LastName; ?>"></label>
        <label><span class="profile-edit-input-s">Имя </span><input  name="FirstName" type="text" value="<?php echo $user_FirstName; ?>"></label>
        <label><span class="profile-edit-input-s">Отчество </span><input  name="FathName" type="text" value="<?php echo $user_FathName; ?>"></label>
        <?php if($user_rights == 0) { ?>
        <label><span class="profile-edit-input-s">Курс </span><select name="course">
            <option disabled><?php if($user_course !== null) { echo $user_course;} else { echo "Выберите курс";} ?> </option>
            <?php
                for($i = 1; $i <= 6; $i++) {
                    if($i == $user_course) {
                        echo "<option value='" . $i . "' selected>". $i . "</option>";
                    } else {
                        echo "<option value='" . $i . "'>". $i . "</option>";
                    }
                }
            ?>
        </select></label>
        <label><span class="profile-edit-input-s">Группа </span><input  name="ngroup" type="text" value="<?php echo $user_ngroup; ?>"></label>
        <label><span class="profile-edit-input-s">Специальность </span><select name="speciality">
                <option disabled>Выберите специальность</option>
                <option value="история" <?php if("история" == $user_speciality) { echo "selected";} ?> >история</option>
                <option value="музееведение" <?php if("музееведение" == $user_speciality) { echo "selected";} ?>>музееведение</option>
                <option value="архивоведение" <?php if("архивоведение" == $user_speciality) { echo "selected";} ?>>архивоведение</option>
                <option value="документоведение" <?php if("документоведение" == $user_speciality) { echo "selected";} ?>>документоведение</option>
        </select></label>
        <?php } else { ?>
        <label><span class="profile-edit-input-s">Кафедра </span><input  name="kath" type="text" value="<?php echo $user_kath; ?>"></label>
        <label><span class="profile-edit-input-s">Звание </span><select name="degree">
            <option disabled>Выберите звание</option>
            <option value="Профессор" <?php if("Профессор" == $user_degree) { echo "selected";} ?>>Профессор</option>
            <option value="Доцент" <?php if("Доцент" == $user_degree) { echo "selected";} ?>>Доцент</option>
            <option value="без степени" <?php if("без степени" == $user_degree) { echo "selected";} ?>>без степени</option>
        </select></label>
        <?php } ?>
        <label><span class="profile-edit-input-s">E-mail </span><input  name="e-mail" type="email" value="<?php echo $user_email; ?>"></label>
        <label><span class="profile-edit-input-s">Логин </span><input  name="login" type=text" value="<?php echo $user_login; ?>"></label>
        <button id="editInfoSubmit" type="submit" name="editInfoSubmit" value="submit">Изменить</submit>
    </form>
    </div>
    <div>
        <form id="changePassword" name="changePassword" action="" method="post" accept-charset="utf8_general_ci">
            <label><span class="profile-edit-input-s">Старый пароль </span><input  name="old_password" type="password" placeholder="**********"></label>
            <label><span class="profile-edit-input-s">Новый пароль </span><input  name="new_password" type="password" placeholder="**********"></label>
            <label><span class="profile-edit-input-s">Повторите новый пароль </span><input  name="new_password_ag" type="password" placeholder="**********"></label>
            <button id="changePassSubmit" type="submit" name="changePassSubmit" value="submit">Сменить пароль</submit>
        </form>
    </div>
</div>