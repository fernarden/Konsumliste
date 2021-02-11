<?php

include 'config.php';
if (isset($_POST['action']) && $_POST['action'] == "add"){
    $item = $_POST['item'];
    //$item = utf8_encode($item);
    $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
    mysqli_set_charset($con, "utf8");
    $res = mysqli_query($con, "INSERT INTO konsum_dmce (item) VALUES('$item')");
    $lastID = mysqli_insert_id($con);
    $res = mysqli_query($con, "SELECT * FROM konsum_dmce WHERE `id` = '$lastID'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    mysqli_close($con);
    echo json_encode($row);
}
else if (isset($_POST['action']) && $_POST['action'] == "delete"){
        $id = $_POST['id'];
        $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
        $res = mysqli_query($con, "DELETE FROM konsum_dmce WHERE id = $id");
        mysqli_close($con);
}
else if (isset($_POST['action']) && $_POST['action'] == "kaufen"){
        $id = $_POST['id'];
        $gekauft = $_POST['gekauft'];
        $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
        $res = mysqli_query($con,"UPDATE `konsum_dmce` SET `gekauft` = '$gekauft' WHERE `id` = '$id'");
        mysqli_close($con);

}
else {
$con=mysqli_connect ("$mysql_host","$mysql_user","$mysql_pass","$mysql_db");
mysqli_set_charset($con, "utf8");
$res = mysqli_query($con,"SELECT * FROM konsum_dmce ORDER BY gekauft ASC, id DESC");
$data = array();
while($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

    echo json_encode($data);

mysqli_close($con);
}