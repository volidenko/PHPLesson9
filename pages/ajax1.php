<?php
include_once("functions.php");
$link = connect();
$countryid=$_GET["cid"];
$sel2 = "SELECT * FROM Cities WHERE countryid=". $countryid;
$res = mysqli_query($link, $sel2);
echo "<option value='0'>Выберите город...</option>";
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
}