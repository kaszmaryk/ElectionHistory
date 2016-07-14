<?php
class model_media extends Model{
    public function get_photos() {
        require_once("application/included/dbconnect.php");
        $sql = "SELECT * FROM photos_list";
        $query = mysqli_query($conn, $sql);

        return $query;
    }
}