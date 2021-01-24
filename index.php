<?php
session_start();
include_once("pages/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="row">
        <div class="col-sm-12 col-md-12 col-lg-12"></div>
    </header>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <?php
            include_once("pages/menu.php");
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
            if(isset($_GET["page"])) {
                $page=$_GET["page"];
                if($page==1) include_once("pages/tours.php");
                if($page==2) include_once("pages/comments.php");
                if($page==3) include_once("pages/registration.php");
                if($page==4) include_once("pages/admin.php");
                if($page==5) include_once("pages/hotelinfo.php");
                if($page==6) include_once("pages/private.php");
            }
        ?>
        </div>
    </div>
    <footer class="row fixed-bottom">
        <div class="col-sm-12 col-md-12 col-lg-12">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>