<?
include_once("function.php");
// $title = "iPhone X11";
// $price = 25999.9;
// $manuf =1;
if(isset($_POST['title']) && isset($_POST['price']) && isset($_POST['manId'])){
    if (addGood($title, $price, $manuf)){
        echo "<span style='color:blue;'>Товар добавлен</span>";
    }
    else echo "Error while good adding";
}
?>
<h2>Добавить новый товар</h2>
<form method="POST">
    <p>Название товара:<br>
        <input type="text" name="title" /></p>
    <p>Цена товара:<br>
        <input type="number" name="price" step="0.01" /></p>
    <p>Производитель: <br>
        <input type="number" name="manId" /></p>
    <input type="submit" value="Добавить">
</form>
<a class="nav-link" href="index.php?page=1">На главную<a>
<a class="nav-link" href="pages/addManufacturer.php">Добавить производителя<a>