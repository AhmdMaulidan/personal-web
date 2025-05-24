<?php
if (!isset($_SESSION['U']) && (!isset($_SESSION['P']))){
    header("location:../pages/login.php");
}
include("../configs/connection.php");
    $id = $_GET['id'];
    $sql = mysqli_query($connect, "delete from user where id_user = '$id'");
    header("location:../pages/userM.php");
?>