<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hotel Info</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/info.css">
</head>
<body>
    <?php
        include_once ("functions.php");
        if(isset($_GET['hotel'])){
            $hotelid=$_GET['hotel'];
            $link = connect();
            $sel='SELECT * FROM hotels where id='.$hotelid;
            $res=mysqli_query($link, $sel);
            $row=mysqli_fetch_array($res,MYSQLI_NUM);
            $hname=$row[1];
            $hstars=$row[4];
            $hcost=$row[5];
            $hinfo=$row[6];
            mysqli_free_result($res);
            echo '<h2 class="text-uppercase text-center" style="color:blue">'.$hname.'</h2>';
            echo '<div class="row"><div class="col-md-12 text-center">';
            $sel2='SELECT imagepath FROM images where hotelid='.$hotelid;
            $res=mysqli_query($link, $sel2);
            echo '<span class="label label-info">Watch our pictures</span>';
            echo'<ul id="gallery">';
            while($row=mysqli_fetch_array($res,MYSQLI_NUM))
            {
                echo '<img src="../'.$row[0].'" alt="image" style="width: 400px">';
            }
            echo '</ul>';
            $i=0;
            for ($i=0; $i<$hstars; $i++)
            {
                echo '<image src="../images/star.png" alt="star" style="width: 24px">';
            }
            echo "<form method='POST'>";
            echo '<br><span class="label label-info">Cost '.$hcost.'$ </span>';
            echo '<button type="submit" name="Info" class="btn btn-primary">Book this Hotel</button>';
            echo "</form>";
            if (isset($_POST['Info'])){
                echo "<div>$hinfo</div>";
            }
            mysqli_free_result($res);
            echo '</div>';
            echo '</div>';
        }
    ?>
    <a class="nav-link" href="../index.php?page=1">На главную<a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>




<!--карусель 
    echo'<ul id="gallery">';
            echo '<div class="row"><div class="col-md-6">';
            $res=mysqli_query($link, $sel2);
            $row=mysqli_fetch_array($res,MYSQLI_NUM);
            echo '<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../'.$row[0].'" class="d-block w-100" alt="image">
                </div>';
                while($row=mysqli_fetch_array($res,MYSQLI_NUM))
                {
                    echo '<div class="carousel-item">
                    <img src="../'.$row[0].'" class="d-block w-100" alt="image">
                    </div>';
                }
            echo '</div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>';
            echo '</div>';
            echo '</div>';
            echo '</ul>'; -->