<?
include_once("function.php");
$link = connect();
$query ="CREATE TABLE Manufacturers(
    Id int NOT null PRIMARY KEY AUTO_INCREMENT,
    ManufactName varchar(30) not null
)";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    echo "Создание таблицы прошло успешно";
}
else echo "Error";
mysqli_close($link);
?>