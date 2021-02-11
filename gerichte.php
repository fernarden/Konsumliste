<?php

include 'config.php';
if (isset($_POST['action']) && $_POST['action'] == "add"){
    $zutat = $_POST['zutat'];
    $rezept_id = $_POST['rezept_id'];
    //$item = utf8_encode($item);
    $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
    mysqli_set_charset($con, "utf8");
    $res = mysqli_query($con, "INSERT INTO haven_zutaten (zutat, rezept_id) VALUES('$zutat','$rezept_id')");
    $lastID = mysqli_insert_id($con);
    $res = mysqli_query($con, "SELECT * FROM items WHERE `id` = '$lastID'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    mysqli_close($con);
    echo json_encode($row);
}
else if (isset($_POST['action']) && $_POST['action'] == "delete"){
        $id = $_POST['id'];
        $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
        $res = mysqli_query($con, "DELETE FROM items WHERE id = $id");
        mysqli_close($con);
}
else if (isset($_POST['action']) && $_POST['action'] == "getZutaten"){
        $id = $_POST['id'];
        $con = mysqli_connect("$mysql_host", "$mysql_user", "$mysql_pass", "$mysql_db");
        $res = mysqli_query($con,"SELECT r.name, r.id, z.zutat FROM haven_rezepte r LEFT JOIN haven_rezept_zutaten rz ON  r.id=rz.rezept_id LEFT JOIN  haven_zutaten z on z.id=rz.zutat_id where rezept_id=$id");
        $data = array();
        while($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        echo json_encode($data);
        mysqli_close($con);


}
else {
$con=mysqli_connect ("$mysql_host","$mysql_user","$mysql_pass","$mysql_db");
mysqli_set_charset($con, "utf8");
$res = mysqli_query($con,"SELECT * FROM haven_rezepte ORDER BY id DESC");
$data = array();
while($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

    echo json_encode($data);

mysqli_close($con);
}