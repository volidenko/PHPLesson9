<?
include_once("function.php");
$link = connect();
$query ="CREATE TABLE Goods(
    Id int NOT null PRIMARY KEY AUTO_INCREMENT,
    Title varchar(30) not null,
    Price double not null,
    ManufacturerId int not null,
    FOREIGN KEY GoodsManufacturerFK (ManufacturerId) REFERENCES manufacturers(Id) ON DELETE No ACTION ON UPDATE CASCADE
)";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    echo "Создание таблицы прошло успешно";
}
else echo "Error";
mysqli_close($link);
?>