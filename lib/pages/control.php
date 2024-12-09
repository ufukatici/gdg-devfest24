<?php
session_start();
$title = "Çekiliş Sayfası";
?>


<div class="main-banner" style="background-image: url(../../images/main-bg4.jpg);">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="main-banner-content">
                    <h1 class="poppins-bold">
                        <span>Devfest</span>
                        <b>2</b>
                        <b>0</b>
                        <b>2</b>
                        <b>4</b>
                    </h1>
                    <br>
                    <h1 class="poppins-medium"><?php echo $_SESSION['message'];?></h1>
                    <br>
                    <br>
                    <a class="primary primary-btn" href="/anasayfa">ANASAFA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="shape1">
        <img src="../../images/shapes/1.png" alt="shape1" width="77" height="77">
    </div>
    <div class="shape2 rotateme">
        <img src="../../images/shapes/2.png" alt="shape2" width="38" height="38">
    </div>
    <div class="shape3 rotateme">
        <img src="../../images/shapes/3.png" alt="shape3" width="51" height="57">
    </div>
    <div class="shape4">
        <img src="../../images/shapes/4.png" alt="shape4" width="29" height="29">
    </div>
</div>
