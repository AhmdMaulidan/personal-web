<!-- content contact -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "personalweb_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $massage = $conn->real_escape_string($_POST['pesan']);

    $sql = "INSERT INTO contact (name, email, massage) VALUES ('$name', '$email', '$massage')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesan berhasil dikirim!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>
<form name="contact-form" id="contact-formId" method="POST" action="">
    <div class="form-group">
        <label for="emailId">Email</label>
        <input type="email" class="form-control" name="email" id="emailId" placeholder="inputkan alamat email" required>
    </div>
    <div class="form-group">
        <label for="nameId">Nama</label>
        <input type="text" class="form-control" name="name" id="nameId" placeholder="inputkan nama lengkap" required>
    </div>
    <div class="form-group">
        <label for="pesanId">Pesan</label>
        <textarea class="form-control" name="pesan" id="pesanId" placeholder="uraikan pesan" required></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" name="submit" value="Kirim">
    </div>
</form>
<!-- end of content contact -->