<?php include("application/included/menu.php"); ?>
    <div class="block main-info">
    <div>
        <h1 class="directory-head">Теория</h1>
    </div>
<?php if($user_rights == 1) { ?>
    <div class="tests-control-b">
        <a href="/theory/add" class="tests-add-a">
            <div class="tests-add">
                <span>добавить лекцию</span>
                <img src="../../img/system/add.png">
            </div>
        </a>
    </div>
<?php } ?>
    <div>
        <table width="100%" class="summary-tests-table theory-table" cellspacing="0">
            <tbody>
            <?php
                while($row = mysqli_fetch_array($data)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $class = '';

                    ?>
                    <tr class="<?php echo $class;?>">
                        <td>
                            <?php echo $title; ?>
                        </td>
                        <td>
                            <a href='/theory/read?id=<?php echo $id; ?>' class='btn'>Читать</a>
                        </td>
                        <?php
                        if($user_rights > 0) {
                            ?>
                            <td>
                                <a href='/theory/edit?id=<?php echo $id; ?>' class='btn'>Редактировать</a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php
                }
            ?>
    </div>
    </div>
