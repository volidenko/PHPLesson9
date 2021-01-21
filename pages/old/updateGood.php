<?
include_once("function.php");
$link=  connect();
// если запрос POST 
if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['manId'])){
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));
    $price = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
    $manId = htmlentities(mysqli_real_escape_string($link, $_POST['manId']));
    $query ="UPDATE goods SET title='$title', price='$price', ManufacturerId='$manId' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result){
        //echo "<span style='color:blue;'>Данные обновлены</span>";
        header('Location: ../index.php');
    }
}
 
// если запрос GET
if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $query ="SELECT * FROM goods WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result);
        $title = $row[1];
        $price = $row[2];
        $manId = $row[3];
        echo "<h2>Изменить товар</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Название товара:<br> 
            <input type='text' name='title' value='$title' /></p>
            <p>Цена товара:<br>
            <input type='number' name='price' value='$price' step='0.01' /></p>
            <p>Производитель: <br>
            <input type='number' name='manId' value='$manId'/></p>
            <input type='submit' value='Обновить'>
            </form>";
        mysqli_free_result($result);
    }
}
mysqli_close($link);
?>
<a class="nav-link" href="../index.php">На главную<a>