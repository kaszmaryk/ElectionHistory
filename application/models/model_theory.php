<?php
class model_theory extends Model{
    public function get_data() {
        require_once("/application/included/dbconnect.php");
        $sql = "SELECT * FROM `theorie_list`";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function get_page($id) {
        require_once("/application/included/dbconnect.php");
        list($param, $val) = explode("=", $id);
        if($param == 'id') {
            $id = $val;
        }
        $sql = "SELECT * FROM `theorie_list` WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);

        return $result;
    }
}