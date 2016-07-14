<?php
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME); //подключаемся к базе

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET 'utf8'");
mysqli_query($conn, "SET SESSION collation_connection = 'utf8_general_ci'");