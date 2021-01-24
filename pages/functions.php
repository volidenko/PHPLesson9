<?php
function connect($host="localhost", $user="root", $pasw="root", $dbName="traveldb"){
    $link = mysqli_connect($host, $user, $pasw) or die("Не удалось подключиться к серверу");
    mysqli_select_db($link, $dbName) or die("Не удалось подключиться к базе");
    mysqli_query($link, "set names 'utf8'");
    return $link;
}

function register($login, $passw, $email){
    $login=trim(htmlspecialchars($login));
    $passw=trim(htmlspecialchars($passw));
    $email=trim(htmlspecialchars($email));
    
    if($login=="" || $passw=="" || $email==""){
        echo "<h3><span style='color:red'>Необходимо заполнить все поля!</span></h3>";
        return false;
    }

    if(strlen($login)<3 || strlen($login)>30){
        echo "<h3/><span style='color: red'>Логин должен быть от 3 до 30 символов!</span><h3/>";
        return false;
    }
    $link = connect();
    $ins1="INSERT INTO users (login, pass, email, roleid) VALUES ('".$login."', '".md5($passw)."', '".$email."', 2)";
    mysqli_query($link, $ins1);
    $err = mysqli_errno($link);
    if($err){
        if($err==1062)
        {
            echo "<h3/><span style='color: red'>Пользователь с таким логином существует!</span><h3/>";
            return false;
        }
        else
        {
            echo "<h3/><span style='color: red'>Код ошибки: ".$err."</span><h3/>";
            return false;
        }
    }
    return true;
}

?>