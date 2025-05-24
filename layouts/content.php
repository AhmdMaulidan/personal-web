<!-- content -->
<div class="container" >
    <div class="row">
        <!-- main content -->
        <div class="col-md-9 content">
            <?php
            if ($pageinfo == "Biography") {
                include("content-biography.php");
            } elseif ($pageinfo == "Biography Form"){
                include("content-biography-form.php");
            } elseif ($pageinfo == "Portfolio"){
                include("content-portfolio.php");
            }elseif ($pageinfo == "Portfolio Form"){
                include("content-portfolio-form.php");
             }elseif ($pageinfo == "Contact"){
                include("content-contact.php");
            }elseif ($pageinfo == "Login"){
                include("content-login.php");
            }elseif ($pageinfo == "UserManagement"){
                include("content-userM.php");
            }elseif ($pageinfo == "UserManagement Form"){
                include("content-userM-form.php");
            }
            ?>
        </div>
        <!-- sidebar content -->
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
</div>
<!-- end of content -->