<?php
include_once("functions.php");
$link = connect();
$cityid=$_POST["cityid"];
$sel2 = "SELECT * FROM Hotels WHERE cityid=". $cityid;
$res = mysqli_query($link, $sel2);
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
}