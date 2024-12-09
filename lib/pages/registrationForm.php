<?php $title = "GDG - WTM Kütahya | Çekiliş" ?>

<div class='page-title-area' style="background-image: url('../../images/main-bg4.jpg');">
    <div class="container">
        <div class="page-title-content poppins-regular">
            <h1 class="poppins-bold">Kayıt</h1>
            <span>Sertifika İçin Etkinliğe Kayıt Yapın</span>
            <ul>
                <li>
                    <a href="/anasayfa" style="text-decoration: none;">Anasayfa</a>
                </li>
                <li>Kayıt</li>
            </ul>
        </div>
    </div>
</div>

<div class="contact-area ptb-120">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="content poppins-regular">
                        <h4>E-mail</h4>
                        <p>gdgkutahya@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa-solid fa-globe"></i>
                    </div>

                    <div class="content poppins-regular">
                        <h4>Konum</h4>
                        <p>Abdullah Taktak Amfi Salonu</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row h-100 align-items-center contact-form">
            <div class="col-lg-12 col-md-12">
                <form action="lib/api/registration-form.php" method="POST">
                    <div class="row poppins-regular">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="name">İsim-Soyisim*</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="number">Telefon Numarası*</label>
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="primary primary-btn">Kayıt</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


