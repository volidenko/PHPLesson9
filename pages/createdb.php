<?
include_once("functions.php");
$link = connect();

$qu1 = "CREATE TABLE Countries(
    id int not null auto_increment primary key,
    country varchar(32) UNIQUE
) default charset='utf8'";

$qu2 = "CREATE TABLE Cities(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    City varchar(32),
    CountryId int,
    FOREIGN KEY (CountryId) REFERENCES Countries(Id) ON DELETE CASCADE,
    UCity varchar(64),
    UNIQUE INDEX UCity(id, CountryId)
) default charset='utf8'";

$qu3 = "CREATE TABLE Hotels(
    id int not null PRIMARY KEY AUTO_INCREMENT,
    hotel varchar(64),
    countryid int,
    FOREIGN KEY(countryid) REFERENCES Countries(Id) ON DELETE CASCADE,
    cityid int,
    FOREIGN KEY(cityid) REFERENCES Cities(Id) ON DELETE CASCADE,
    stars int, 
    cost double,
    info varchar(1024)
) default charset='utf8'";

$qu4 = "CREATE TABLE Images (
    id int not null primary KEY AUTO_INCREMENT, 
    hotelid int,
    FOREIGN key (hotelid) REFERENCES Hotels(id) ON DELETE CASCADE,
    imagepath varchar(255)
) default charset='utf8'";

$qu5 = "CREATE TABLE Roles (
    id int not null PRIMARY KEY AUTO_INCREMENT, 
    role varchar(32) UNIQUE
) default charset='utf8'";

$qu6 = "CREATE TABLE Users (
    id int not null primary KEY AUTO_INCREMENT, 
    login varchar(30) UNIQUE, 
    pass varchar(128), 
    email varchar(64), 
    roleid int,
    FOREIGN KEY (roleid) REFERENCES Roles(id) ON DELETE CASCADE,
    discount int, 
    avatar mediumblob
) default charset='utf8'";

mysqli_query($link, $qu1);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 1: ".$err."</span><h3/>";
    exit();
}
mysqli_query($link, $qu2);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 2: ".$err."</span><h3/>";
    exit();
}
mysqli_query($link, $qu3);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 3: ".$err."</span><h3/>";
    exit();
}
mysqli_query($link, $qu4);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 4: ".$err."</span><h3/>";
    exit();
}
mysqli_query($link, $qu5);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 5: ".$err."</span><h3/>";
    exit();
}
mysqli_query($link, $qu6);
$err = mysqli_errno($link);
if($err){
    echo "<h3/><span style='color: red'>Query 6: ".$err."</span><h3/>";
    exit();
}
echo "<h3/><span style='color: green'>Таблицы созданы успешно!</span><h3/>";