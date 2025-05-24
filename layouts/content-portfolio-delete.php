<?php
if (!isset($_SESSION['U']) && (!isset($_SESSION['P']))){
    header("location:../pages/login.php");
}
include("../configs/connection.php");
    $id = $_GET['id'];
    $sql = mysqli_query($connect, "delete from portfolio where id_port = '$id'");
    header("location:../pages/portfolio.php");
?>