<?php include("application/included/menu.php"); ?>
<div class="block main-info">
<div>
    <h1 class="directory-head">Тесты</h1>
</div>
<?php if($user_rights == 1) { ?>
<div class="tests-control-b">
    <a href="/tests/add" class="tests-add-a">
    <div class="tests-add">
        <span>добавить тест</span>
        <img src="../../img/system/add.png">
    </div>
    </a>
</div>
<?php } ?>
<div>
    <table width="100%" class="summary-tests-table" cellspacing="0">
        <tbody>
        <?php
        while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $title = $row['test_name'];
            $class = '';
            $utest_list = explode(";", $user_tests);
            ?>
            <tr class="<?php echo $class;?>">
                <td>
                    <?php echo $title; ?>
                </td>
                <td>
                    <?php
                    if(is_array($utest_list))
                        {
                            $count_test = count($utest_list);
                            $test_c = 1;
                            foreach ($utest_list as $test_n)
                            {
                                if(strpos($test_n, ":"))
                                {
                                    list($tid, $tmark) = explode(":", $test_n);
                                    if ($id == $tid)
                                    {
                                        echo $tmark;
                                    }
                                    else
                                    {
                                        echo "Не пройден";
                                    }
                                }
                                else
                                {
                                    if($count_test != $test_c)
                                    {
                                        echo " не пройден";
                                    }
                                }
                                $test_c+=1;
                            }
                        }
                    else {
                        echo "Не пройден";
                    }
                    ?>
                </td>
                <td>
                    <a href='/tests/testing?id=<?php echo $id; ?>' class='btn'>Пройти</a>
                </td>
                <?php
                if($user_rights > 0) {
                    ?>
                <td>
                    <a href='/tests/edit?id=<?php echo $id; ?>' class='btn'>Редактировать</a>
                </td>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
</div>
</div>