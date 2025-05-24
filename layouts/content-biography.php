<!-- content biography -->
<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
        $btn_status ="hidden";
        $table = "";
        $hr="";
    } else{       
        $btn_status ="";
        $hr="<hr>";
        $table ="hidden";
    }
    error_reporting(0);
    include("../configs/connection.php");
    $user = $_SESSION['U'];
    $sql = mysqli_query($connect, "select * from user where username = '$user'");
    $data = mysqli_fetch_array($sql);

    $iduser = $data['id_user'];

    $bio= mysqli_query($connect, "select * FROM biography JOIN user ON user.id_user = biography.id_user WHERE user.id_user = '$iduser'");
    $biodat = mysqli_fetch_array($bio);

    
    $tablebio = mysqli_query($connect, "select * from biography JOIN user ON user.id_user = biography.id_user");   
?>
<button class="btn btn-info" <?php echo $btn_status; ?> onclick="location.href='../pages/biography-form.php? id=<?php echo $biodat['id_bio'];?>'">Edit Data</button>
<?php echo $hr; ?>

<h3 style="text-align:left">
    <?php echo $data['name']; ?>
</h3>

<div class="container" <?php echo $btn_status; ?>>
        <small>Deskripsi Bio:</small>
        <p style="text-align:left; margin-top:10px"><?php echo $biodat['biography']; ?></p>
</div>

<!-- Tabel biography -->
<table class="table table-striped" <?php echo $table; ?>> 
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Biography</th>
        </tr>
    </thead>

    <?php
        $nomor=1;
        while($data = mysqli_fetch_array($tablebio)) { ?> 
        <tbody>
            <tr>
                <td scope="row"> <?php echo $nomor; ?> </td>
                <td> <?php echo $data['name']; ?> </td>
                <td> <?php echo $data['biography'];?> </td>
            </tr>
        </tbody>
    <?php $nomor++; } ?>
</table>
<!-- end of content biography -->