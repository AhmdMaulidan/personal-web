<!-- content portfolio -->
<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
$hidestatus = "hidden";
$hr = "";
}else{
    $hidestatus = "";
    $hr = "<hr>";
    }
    include("../configs/connection.php");
    $sql = mysqli_query($connect, "select * from portfolio");
    ?>
<button class="btn btn-info" <?php echo $hidestatus; ?> onclick="location.href='portfolio-form.php?id'">Add Data</button>
<?php echo $hr; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project Name</th>
            <th scope="col">Year</th>
            <th scope="col">Description</th>
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
            <td><?php echo $data['project_name']; ?></td>
            <td><?php echo $data['year']; ?></td>
            <td><?php echo $data['description']; ?></td>
            <td <?php echo $hidestatus; ?>><a href="portfolio-form.php?id=<?php echo $data['id_port']; ?>">Edit</a> | <a href="../layouts/content-portfolio-delete.php?id=<?php echo $data['id_port']; ?>" onclick="return KonfirmasiHapus()">Delete</a></td>
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
<!-- end of content portfolio -->