<?
include_once("function.php");
if(isset($_POST['manName'])){
    if (addManufacturer($manName)){
        echo "<span style='color:blue;'>Производитель добавлен</span>";
    }
    else echo "Error!";
}
?>
<h2>Добавить производителя</h2>
<form method="POST">
    <p>Производитель: <br>
        <input type="text" name="manName" /></p>
    <input type="submit" value="Добавить">
</form>

<a class="nav-link" href="../index.php">На главную<a>
<a class="nav-link" href="../index.php?page=2">Добавить товар<a>