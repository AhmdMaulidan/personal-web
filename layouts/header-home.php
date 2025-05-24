<!-- header home -->
<div class="jumbotron jumbotron-fluid jumbotron-home">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="bio col-md-6" style="margin-top: -120px;">
                <?php
                if (isset($_SESSION['U']) and (isset($_SESSION['P']))){
                    echo "Hello ",$_SESSION['U'], "👋, kenalin aku";
                }?>
                <P><a href="https://www.linkedin.com/in/ahmad-maulidan-880996218/" class="text-toska fw-semibold fs-2">Ahmad Maulidan</a></P>
                <h1 class="header-title text-uppercase fw-bold mb-5 fs-1">Tech enthusiast<br class="d-none d-md-block">based in Indonesia
                </h1>
                <a href="https://cashin.my.id" class="header-skill d-inline-flex align-items-center gap-2 fs-3">
                    Web Depelopment🌟
                </a> <br>
                <a href="https://cashin.my.id" class="header-skill d-inline-flex align-items-center gap-2 fs-5 ">
                    Mobile Depelopment✨
                </a> <br>
                <a href="https://cashin.my.id" class="header-skill d-inline-flex align-items-center gap-2">
                    Graphic Designer💫
                </a>
                <div class="d-flex align-items-center gap-4 mt-5">
                    <div class="d-flex align-items-center gap-2">
                        <h2 class="header-skill fw-bold mb-0">2+</h2>
                        <p class="text-secondary fs-7 mb-0">Years of <br>Experience</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <h2 class="header-skill fw-bold mb-0">10+</h2>
                        <p class="text-secondary fs-7 mb-0">Happy<br>Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end of header home -->