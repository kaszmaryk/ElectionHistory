<?php
$page_id = $_REQUEST["id"];
$user_login = $_REQUEST["login"];
$nprogress = '';

require_once("../../config.php");
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET 'utf8'");
mysqli_query($conn, "SET SESSION collation_connection = 'utf8_general_ci'");

$sql = "SELECT * FROM users WHERE `login`='$user_login'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
if($row['progress_theorie'] != null)
{
    if(strpos($row['progress_theorie'], ";"))
    {
        $nrow = explode(";", $row['progress_theorie']);
        foreach($nrow as $pos)
        {
            if($pos == $page_id)
            {
                $nprogress = $row['progress_theorie'];
            }
            else
            {
                $nprogress = $row['progress_theorie'].";".$page_id;
            }
        }
    } elseif($row['progress_theorie'] == $page_id)
    {
            $nprogress = $row['progress_theorie'];
    }
    else
    {
            $nprogress = $row['progress_theorie'] . ";" . $page_id;
    }
}
else
{
    $nprogress = $page_id;
}

$sql = "UPDATE users SET `progress_theorie`='$nprogress' WHERE `login`='$user_login'";
$res = mysqli_query($conn, $sql);

echo "Message";
