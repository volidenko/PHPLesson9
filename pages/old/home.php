<?
include_once("function.php");
$link=  connect();
$db=mysqli_select_db($link, "ShopDb") or die("Данная БД отсуствует!");
$query ="SELECT Goods.Id, Goods.Title,  Manufacturers.ManufactName, Goods.Price from Manufacturers JOIN Goods ON Manufacturers.Id=Goods.ManufacturerId";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    $rows = mysqli_num_rows($result);
    echo "<form action='' method='POST'>
    <table><tr><th>Id</th><th>Модель</th><th>Производитель</th><th>Цена</th><th></th><th></th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j){
                echo "<td>$row[$j]</td>";
            }
            echo '<td><a class="nav-link" href="pages/deleteGood.php?id='.$row[0].'">Удалить<a></td>';
            echo '<td><a class="nav-link" href="pages/updateGood.php?id='.$row[0].'">Редактировать<a></td>';
        echo "</tr>";
    }
    echo "</table>
    </form>";
    mysqli_free_result($result);
}
echo "</br>";
echo "Количество товара - ".$rows."<br/>";
?>

<!-- echo '<script>window.location="index.php";</script>';
<input type="checkbox" name="delete[]" value="{$row[`id`]}">
<input type="checkbox" name=`cb".$row[0]."`>
<input type="checkbox" class="cIdArray" name="cIdArray[]" value="<?php echo ($row[`id`]); ?>"> -->