<h3>Редактирование Пользователей</h3>
<?php
$link = connect();
$sel1 = "SELECT * FROM Users WHERE Roleid=2";
$res = mysqli_query($link, $sel1);
echo "<form action='index.php?page=6' method='POST' enctype='multipart/form-data'>";
echo "<select name='userid' class='col-sm-3 col-md-3 col-lg-3'>";
// echo "<option value='0'>Выберите пользователя...</option>";
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
echo "</select><br>";
echo "<input type='file' name='photo' accept='image/*'>";
echo "<button type='submit' name='addphoto' class='btn btn-sm btn-primary'>Добавить</button>";
echo "</form>";
if (isset($_POST["addphoto"])) {
    $userid=$_POST["userid"];
    if($userid==0) exit();
    $fn = $_FILES["photo"]["tmp_name"];
    $file=fopen($fn,'rb');
    $img=fread($file, filesize($fn));
    fclose($file);
    $img=mysqli_real_escape_string($link, $img);
    $upd1="UPDATE Users SET avatar='".$img."', roleid=1 WHERE id=".$userid;
    mysqli_query($link, $upd1);
    $err = mysqli_errno($link);
    if ($err) {
        echo "<h3/><span style='color: red'>Error No: " . $err . "</span><h3/>";
        exit();
    }
    echo "<script>";
    echo "window.location = document.URL";
    echo "</script>";
}
$sel2 = "SELECT * FROM Users WHERE Roleid=1";
mysqli_free_result($res);
$res = mysqli_query($link, $sel2);
echo '<table class="table table-striped">';
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo '<tr>';
    echo '<td>' . $row[0] . '</td>';
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    $img=base64_encode($row[6]);
    echo "<td><img style='height:100px;' src='data:image/jpeg; base64, ".$img."'alt='photo'/></td>";
    echo '</tr>';
}
echo '</table>';