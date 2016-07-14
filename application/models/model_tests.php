<?php
class model_tests extends Model{
    public function get_data() {
        require_once("/application/included/dbconnect.php");
        $sql = "SELECT * FROM `test_list`";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function get_test($id) {
        require_once("/application/included/dbconnect.php");
        list($param, $val) = explode("=", $id);
        if($param == 'id') {
            $id = $val;
        }
        $sql = "SELECT * FROM `test_list` WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($result);

        return $rows;
    }
}