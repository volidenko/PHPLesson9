<?
include_once("function.php");
$link=  connect();
if(isset($_POST['id'])){
$id = mysqli_real_escape_string($link, $_POST['id']);
$query ="DELETE FROM goods WHERE id = '$id'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
header('Location: ../index.php');
}
 
if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    $query ="SELECT title FROM goods WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result);
        $title = $row[0];
        echo "<form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Название товара:<br> 
            <input type='text' name='title' value='$title' readonly /></p>
            <h2>Удалить товар?</h2>
            <input type='submit' value='Удалить'>
            </form>";
        mysqli_free_result($result);
    }
}
mysqli_close($link);
?>
<a class="nav-link" href="../index.php">На главную<a>