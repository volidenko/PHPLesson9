<?php
$link = connect();
$sel1 = "SELECT * FROM Countries";
$res = mysqli_query($link, $sel1);
echo "<select name='countryid' onchange='showCities(this.value)'>";
echo "<option value='0'>Выберите страну...</option>";
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
}
echo "</select>";
echo "<select name='cityid' onchange='showCities(this.value)' id='cityid'>";
echo "</select>";

if (isset($_POST['selsity'])) {
    $cityid = $_POST["cityid"];
    $sel3="SELECT ho.id, ho.Hotel, ci.City, co.Country, ho.cost, ho.stars FROM Hotels ho JOIN Cities ci ON ho.cityid=ci.id
    JOIN Countries co ON ci.countryid=co.id WHERE ho.cityid = ".$cityid;
    $res = mysqli_query($link, $sel3);
    echo '<table class="table table-striped">';
    while ($row=mysqli_fetch_array($res, MYSQLI_NUM)){
        echo '<tr>';
        echo '<td>'.$row[0].'</td>';
        echo '<td>'.$row[1].'</td>';
        echo '<td>'.$row[2].'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td>'.$row[5].'</td>';
        echo "<td><a href='index.php?page=5&hotel=".$row[0]."' target='_blank'>Детальнее...</a></td>";
        echo '</tr>';
    }
    echo '</table>';
}

?>
<script>
async function showCities(val){
    let response=await fetch("pages/ajax1.php?cid="+val, {method: "GET"});
    if(response.ok===true){
        let content=await response.text();
        let citySelect=document.getElementById("cityid");
        citySelect.innerHTML=content;
    }
}

async function showHotels(val){
    let formData=new FormData();
    formData.append("arg1", val);
    let response=await fetch("ajax2.php", {method: "POST", body: formData});
    if(response.ok===true){
        let content=await response.text();
        console.log(content);
        let resDiv=document.getElementById("res");
        resDiv.innerHTML=content;
    }
}
</script>