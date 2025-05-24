<?php
include("connection.php");
$usr = $_POST['user'];
$pss = md5($_POST['pass']);
$sql = mysqli_query($connect, "select * from user where username = '$usr' and password = '$pss'");
$rowcount = mysqli_num_rows($sql);
if ($rowcount !=0){
    session_start();
    $_SESSION['U'] = $usr;
    $_SESSION['P'] = $pss;
    header("location:../pages/home.php");
} else{
    header("location:../pages/login.php");
}
?>