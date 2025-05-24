<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
    header("location:login.php");
}

include("../configs/connection.php");

$sql = mysqli_query($connect, "select * from biography where id_bio = '$_GET[id]'");
$data = mysqli_fetch_array($sql);
?>

<!-- biography form -->
<form name="bioform" method="post" action="" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="bioID">Biography Edit Form</label>
        <textarea class="form-control" name="bio" id="bioID" rows="3" placeholder="Enter your biography"><?php echo $data['biography']; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="updatebio" class="btn btn-info" value="Update Data">
        <input type="reset" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='biography.php'" value="Back">
    </div>
</form>

<script>
function validateForm() {
    const bioField = document.getElementById('bioID');
    if (bioField.value.trim() === '') {
        bioField.style.border = '2px solid red';
        bioField.placeholder = 'Silakan isi tidak boleh kosong!';
        return false;
    }
    bioField.style.border = ''; 
    return true;
}
</script>

<?php

if(isset($_POST['updatebio'])){
    $bioaja = trim($_POST['bio']);
    if (empty($bioaja)) {
        echo "<script type='text/javascript'>alert('Silakan isi tidak boleh kosong!');</script>";
    } else {
        $update = mysqli_query($connect, "update biography set biography = '$bioaja' where id_bio = '$_GET[id]'");
        
        if ($update) {
            header("location:../pages/biography.php");
        } else {
            echo "<script type='text/javascript'> onload =function(){
            alert('Data gagal disimpan!');}</script>";
        }
    }
}
?>