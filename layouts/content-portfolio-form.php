<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))) {
    header("location:login.php");
    exit;
}
include("../configs/connection.php");
$id = $_GET['id'];
$sql = mysqli_query($connect, "select * from portfolio where id_port ='$id'");
$data = mysqli_fetch_array($sql);

$isFormSubmitted = false;
if (isset($_POST['addport']) || isset($_POST['updateport'])) {
    $proj = $_POST['proj'];
    $year = $_POST['year'];
    $desc = $_POST['desc'];

    if (isset($_POST['addport'])) {
        $sql = "insert into portfolio (project_name, year, description) values ('$proj', '$year', '$desc')";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan) {
            $isFormSubmitted = true;
        }
    } elseif (isset($_POST['updateport'])) {
        $sql = "update portfolio set project_name = '$proj', year = '$year', description = '$desc' where id_port = '$id'";
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
<!-- portfolio form -->
<?php if (!$isFormSubmitted) : ?>
<form name="portform" method="post" action="" onsubmit="return validateForm()">
    <div class="form-group" <?php echo $idport; ?>>
        <label for="portID">Portfolio ID</label>
        <input type="text" class="form-control" name="port" id="portID" value="<?php echo $data['id_port']; ?>" <?php echo $idport; ?>>
    </div>
    <div class="form-group">
        <label for="projID">Project Name</label>
        <input type="text" class="form-control" name="proj" id="projID" value="<?php echo $data['project_name']; ?>" placeholder="type project name here">
    </div>
    <div class="form-group">
        <label for="yearID">Year</label>
        <input type="number" class="form-control" name="year" id="yearID" value="<?php echo $data['year']; ?>" placeholder="type year here">
    </div>
    <div class="form-group">
        <label for="descID">Description</label>
        <textarea class="form-control" name="desc" id="descID" rows="3"><?php echo $data['description']; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" value="<?php echo $actval; ?>">
        <input type="reset" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='portfolio.php'" value="Back">
    </div>
</form>
<?php else: ?>
    <div class="alert alert-success">
        <strong>Success!</strong> The portfolio data has been successfully <?php echo isset($_POST['addport']) ? 'added' : 'updated'; ?>.
        <br>
        <a href="portfolio.php" class="btn btn-primary">Back to Portfolio List</a>
    </div>
<?php endif; ?>
<!-- end of portfolio form -->

<script type="text/javascript">
    function validateForm() {
        var proj = document.forms["portform"]["proj"].value;
        var year = document.forms["portform"]["year"].value;
        var desc = document.forms["portform"]["desc"].value;
        
        var isValid = true;

        if (proj == "") {
            document.getElementById('projID').setAttribute('placeholder', 'Project Name harus di isi!');
            document.getElementById('projID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('projID').style.borderColor = '';
        }

        if (year == "") {
            document.getElementById('yearID').setAttribute('placeholder', 'Year harus di isi!');
            document.getElementById('yearID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('yearID').style.borderColor = '';
        }

        if (desc == "") {
            document.getElementById('descID').setAttribute('placeholder', 'Description harus di isi!');
            document.getElementById('descID').style.borderColor = 'red';
            isValid = false;
        } else {
            document.getElementById('descID').style.borderColor = '';
        }

        return isValid;
    }
</script>
