<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
include("dbconnection.php");
$con = dbconnection();


if (isset($_POST["name"])) {
    $name = $_POST["name"];
} else {
    return;
}

if (isset($_POST["descr"])) {
    $description = $_POST["descr"];
} else {
    $description = ""; 
}

if (isset($_POST["stime"])) {
    $stime = $_POST["stime"];
} else {
    $stime = "";
}

if (isset($_POST["etime"])) {
    $etime = $_POST["etime"];
} else {
    $etime = "";
}

if (isset($_POST["date"])) {
    $date = $_POST["date"];
} else {
    $date = ""; 
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
} else {
    $id = ""; 
}

$query = "UPDATE `todo` SET `name`='$name', `descr`='$description', `stime`='$stime', `etime`='$etime', `date`='$date' WHERE `id`='$id'";

$exe = mysqli_query($con, $query);
$arr = [];

if ($exe) {
    $arr["success"] = true;
} else {
    $arr["success"] = false;
    $arr["error"] = mysqli_error($con);
}

print(json_encode($arr));
?>