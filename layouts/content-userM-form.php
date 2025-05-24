<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))) {
    header("location:login.php");
    exit;
}
include("../configs/connection.php");
$id = $_GET['id'];
$sql = mysqli_query($connect, "select * from user where id_user ='$id'");
$data = mysqli_fetch_array($sql);
$isFormSubmitted = false; 

if (isset($_POST['addport']) || isset($_POST['updateport'])) {
    $proj = $_POST['name'];
    $year = $_POST['username'];
    $desc = md5($_POST['password']);
    
    if (isset($_POST['addport'])) {
        $sql = "insert into user (name, username, password) values ('$proj', '$year', '$desc')";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan) {
            $isFormSubmitted = true;
        }
    } elseif (isset($_POST['updateport'])) {
        $sql = "update user set name = '$proj', username = '$year', password = '$desc' where id_user = '$id'";
        $update = mysqli_query($connect, $sql);
        if ($update) {
            $isFormSubmitted = true;
        }
    }
}

if (!$isFormSubmitted) {
    if ($id == "") {
        $idport = "hidden";
        $actbtn = "addport";
        $actval = "Save Data";
    } else {
        $idport = "readonly";
        $actbtn = "updateport";
        $actval = "Update Data";
    }
}
?>
<!-- User Management form -->
<?php if (!$isFormSubmitted): ?>
    <form name="portform" method="post" action="" onsubmit="return validateForm()">
        <div class="form-group" <?php echo $idport; ?>>
            <label for="portID">User ID</label>
            <input type="text" class="form-control" name="port" id="portID" value="<?php echo $data['id_user']; ?>" <?php echo $idport; ?>>
        </div>
        <div class="form-group">
            <label for="projID">Nama</label>
            <input type="text" class="form-control" name="name" id="projID" value="<?php echo $data['name']; ?>"
                placeholder="type name here">
        </div>
        <div class="form-group">
            <label for="yearID">Username</label>
            <input type="text" class="form-control" name="username" id="yearID" value="<?php echo $data['username']; ?>"
                placeholder="type Username here">
        </div>
        <div class="form-group">
            <label for="descID">Password</label>
            <input type="text" class="form-control" name="password" id="descID" value="<?php echo $data['password']; ?>"
                placeholder="type Password here">
        </div>
        <div class="form-group">
            <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" value="<?php echo $actval; ?>">
            <input type="reset" class="btn btn-secondary" value="Reset Data">
            <input type="button" class="btn btn-secondary" onclick="location.href='userM.php'" value="Back">
        </div>
    </form>
<?php else: ?>

    <div class="alert alert-success">
        <strong>Success!</strong> The user data has been successfully <?php echo isset($_POST['addport']) ? 'added' : 'updated'; ?>.
        <br>
        <a href="userM.php" class="btn btn-primary">Back to User Management</a>
    </div>
<?php endif; ?>
<!-- end of User Management form -->

<script type="text/javascript">
    function validateForm() {
        var name = document.forms["portform"]["name"].value;
        var username = document.forms["portform"]["username"].value;
        var password = document.forms["portform"]["password"].value;
        
        var isValid = true;

        if (name == "") {
            document.getElementById('projID').setAttribute('placeholder', 'Nama harus diisi!');
            document.getElementById('projID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('projID').style.borderColor = '';
        }

        if (username == "") {
            document.getElementById('yearID').setAttribute('placeholder', 'Username harus diisi!');
            document.getElementById('yearID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('yearID').style.borderColor = '';
        }

        if (password == "") {
            document.getElementById('descID').setAttribute('placeholder', 'Password harus diisi!');
            document.getElementById('descID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('descID').style.borderColor = '';
        }

        return isValid;
    }
</script>
