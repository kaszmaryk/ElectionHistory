<?php
$testName = $_REQUEST["name"];
$numQuest = $_REQUEST["quest"];
$maxPoints = $_REQUEST["mpoints"];
$author = $_REQUEST["author"];
require_once("../../config.php");
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME); //подключаемся к базе

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET 'utf8'");
mysqli_query($conn, "SET SESSION collation_connection = 'utf8_general_ci'");
$sql = "INSERT INTO test_list(`test_name`, `max_points`, `author`) VALUES ('$testName','$maxPoints','$author')";
$result = mysqli_query($conn, $sql);

$sqlli = "SELECT * FROM test_list WHERE `test_name`='$testName'";
$res = mysqli_query($conn, $sqlli);
$row = mysqli_fetch_array($res);
$test_id = $row['id'];

if ($result) {
    echo "Тест " . $testName . " успешно создан! <span style: display: none>". $test_id . "</span>";
}