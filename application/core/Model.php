<?php
class Model {

    public function get_data() {
        require("application/included/dbconnect.php");
        $sql = "SELECT * FROM 'theorie_list'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

}