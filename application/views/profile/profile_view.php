<?php include("application/included/menu.php"); ?>
<?php if($user_rights == 0) { ?>
    <div class="block main-info">
			<div class="profile-up">
				<img class="profile-img" src="/img/profile/xcd.jpg">
				<h2 class="profile-name"><?php echo $user_LastName . " " . $user_FirstName . " " . $user_FathName;?></h2>
				<span class="profile-education">БГУ, исторический факультет</span></br>
				<span class="profile-group"><?php echo $user_course . " курс"; ?>, <?php echo $user_ngroup; ?> группа</span>
				<div class="profile-mid-rank-g">
					<div class="profile-mid-rank-a" style="background-color: #9cdb47;">
						<span>Средний балл студента</span><br>
						<span class="profile-mid-rank-m">8.7</span>
					</div>
					<div class="profile-mid-rank-a" style="background-color: #9cdb47;">
						<span>Средний балл группы</span><br>
						<span class="profile-mid-rank-m">8.4</span>
					</div>
				</div>
			</div>
			<div class="profile-down">
                <?php
                    $lec_pas = 0;
                    if(strpos($user_progress, ";"))
                    {
                        $lect_arr = explode(';', $user_progress);
                        $lec_pas = count($lect_arr);
                    }
                    elseif($user_progress != null)
                    {
                        $lec_pas = 1;
                    }
                ?>
				<div class="profile-prog-bar">
					<span class="profile-p-b-t">Лекций прочитано:</span></br>
					<span class="profile-p-b">
						<span style="background-color: #9cdb47; width: <?php echo $lec_pas*100/12; ?>%;"></span>
<?php echo $lec_pas; ?>/12
					</span>
					<a href="/theory" class="con-button">Продолжить</a>
				</div>
				<div class="profile-prog-bar">
					<span class="profile-p-b-t">Тестов пройдено:</span></br>
					<span class="profile-p-b">
						<span style="background-color: #db5647; width: 25%;"></span>
3/12
					</span>
					<span class="con-button">Продолжить</span>
					<div class="profile-table">
						<table  border="0" cellpadding="0" cellspacing="0">
							<tbody class="profile-table-tb">
							<tr class="profile-t-head-row">
								<td>Название теста</td>
								<td class="profile-t-m">Оценка</td>
								<td>Действие</td>
							</tr>
							<tr>
								<td>Избирательные системы</td>
								<td class="profile-t-m">8</td>
								<td class="profile-t-m">Перепройти</td>
							</tr>
							<tr>
								<td>Представительные органы РБ</td>
								<td class="profile-t-m">9</td>
								<td class="profile-t-m">Перепройти</td>
							</tr>
							<tr>
								<td>Выборы в ПП НС 2004 года</td>
								<td class="profile-t-m">9</td>
								<td class="profile-t-m">Перепройти</td>
							</tr>
							</tbody>
						</table>
					</div>
					<a href="/profile/edit" class="red-button"><img src="../../img/system/edit.png"><span>Редактировать</span></a>
				</div>
			</div>
            </div>
			<div class="block right-info">
				<h2 class="right-info-head">Куратор</h2>
				<img class="right-info-photo" src="/img/profile/dcg.jpg">
				<h3 class="right-info-name">Винниченко<br><span class="right-info-name2">Алла Павловна</span></h3>
				<p>кандидат наук</p>
				<p>БГУ</p>
				<p>исторический факультет</p>
				<p>к. источниковедения</p>
			</div>
            <?php } else { ?>
<div class="block main-info">
<div class="profile-up">
    <img class="profile-img" src="/img/profile/xcd.jpg">
    <h2 class="profile-name"><?php echo $user_LastName . " " . $user_FirstName . " " . $user_FathName;?></h2>
    <span class="profile-education">БГУ, исторический факультет</span></br>
    <span class="profile-education"><?php echo $user_degree . ", кафедра " . $user_kath;?></span></br>
    <span class="profile-group">E-mail: <?php echo $user_email; ?></span>
<div class="profile-down">
    <a href="/profile/edit" class="red-button"><img src="/img/system/edit.png"><span>Редактировать</span></a>
</div>
</div>
</div>
<div class="block right-info">
        <h2 class="right-info-head">Группы</h2>
        <h3 class="right-info-name">2-я группа, историки</h3>
        <h3 class="right-info-name">3-я группа, историки</h3>
</div>
<?php } ?>
