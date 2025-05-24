<!-- content User Management -->
<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
    $hidestatus = "hidden";
    $hr = "";
    $showPassword = false; // Tambahkan variabel untuk menyembunyikan password
} else {
    $hidestatus = "";
    $hr = "<hr>";
    $showPassword = true; // Tampilkan password jika user sudah login
}
include("../configs/connection.php");
$sql = mysqli_query($connect, "select * from user");
?>
<button class="btn btn-info" <?php echo $hidestatus; ?> onclick="location.href='userM-form.php?id'">Add Data</button>
<?php echo $hr; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <?php if ($showPassword) { ?>
                <th scope="col">Password</th>
            <?php } ?>
            <th scope="col" <?php echo $hidestatus; ?>>Action</th>
        </tr>
    </thead>
    <?php
    $nomor = 1;
    while($data = mysqli_fetch_array($sql)) {
    ?>
    <tbody>
        <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <?php if ($showPassword) { ?>
                <td><?php echo $data['password']; ?></td>
            <?php } ?>
            <td <?php echo $hidestatus; ?>><a href="userM-form.php?id=<?php echo $data['id_user']; ?>">Edit</a> | <a href="../layouts/content-userM-delete.php?id=<?php echo $data['id_user']; ?>" onclick="return KonfirmasiHapus()">Delete</a></td>
        </tr>
    </tbody>
    <?php $nomor++; } ?>
</table>
<script>
function KonfirmasiHapus() {
    if (confirm("Anda yakin data ini akan dihapus?"))
        return true;
    else
        return false;
}
</script>
<!-- end of content User Management -->