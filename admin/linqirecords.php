<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Page Title -->
    <title>GDG - WTM | Dashboard</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- ======= END MAIN STYLES ======= -->

</head>
<body>
<!-- Offcanval Overlay -->
<div class="offcanvas-overlay"></div>
<!-- Offcanval Overlay -->
<!-- Wrapper -->
<div class="wrapper">
    <!-- Header -->
    <header class="header fixed-top d-flex align-content-center flex-wrap">
        <!-- Logo -->
        <div class="logo">
            <a href="/admin" class="default-logo"><img src="assets/img/logo.png" alt=""></a>
            <a href="/admin" class="mobile-logo"><img src="assets/img/mobile-logo.png" alt=""></a>
        </div>
        <!-- End Logo -->

        <!-- Main Header -->
        <div class="main-header">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-3 col-lg-1 col-xl-4">
                        <!-- Header Left -->
                        <div class="main-header-left h-100 d-flex align-items-center">
                            <!-- Main Header User -->
                            <div class="main-header-user">
                                <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                    <div class="menu-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="/admin/includes/logout.php">Çıkış Yap</a>
                                </div>
                            </div>
                            <!-- End Main Header User -->

                            <!-- Main Header Menu -->
                            <div class="main-header-menu d-block d-lg-none">
                                <div class="header-toogle-menu">
                                    <!-- <i class="icofont-navigation-menu"></i> -->
                                    <img src="assets/img/menu.png" alt="">
                                </div>
                            </div>
                            <!-- End Main Header Menu -->
                        </div>
                        <!-- End Header Left -->
                    </div>
                    <div class="col-9 col-lg-11 col-xl-8">
                        <!-- Header Right -->
                        <div class="main-header-right d-flex justify-content-end">
                            <ul class="nav">
                                <li class="d-none d-lg-flex">
                                    <!-- Main Header Time -->
                                    <div class="main-header-date-time text-right">
                                        <h3 class="time">
                                            <span id="hours">11</span>
                                            <span id="point">:</span>
                                            <span id="min">00</span>
                                        </h3>
                                        <span class="date"><span id="date">Sat, 07 December 2024</span></span>
                                    </div>
                                    <!-- End Main Header Time -->
                                </li>
                            </ul>
                        </div>
                        <!-- End Header Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Header -->
    </header>
    <!-- End Header -->
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" data-trigger="scrollbar">
            <!-- Sidebar Header -->
            <div class="sidebar-header d-none d-lg-block">
                <!-- Sidebar Toggle Pin Button -->
                <div class="sidebar-toogle-pin">
                    <i class="icofont-tack-pin"></i>
                </div>
                <!-- End Sidebar Toggle Pin Button -->
            </div>
            <!-- End Sidebar Header -->

            <!-- Sidebar Body -->
            <div class="sidebar-body">
                <!-- Nav -->
                <ul class="nav">
                    <li class="nav-category">Dashboard</li>
                    <li>
                        <a href="/admin">
                            <i class="icofont-dashboard-web"></i>
                            <span class="link-title">Çekiliş Kayıtları</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/eventrecords.php">
                            <i class="icofont-bars"></i>
                            <span class="link-title">Etkinlik Kayıtları</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/admin/linqirecords.php">
                            <i class="icofont-pie-alt"></i>
                            <span class="link-title">Linqi Kayıtları</span>
                        </a>
                    </li>
                    <li>
                        <a href="/gdgcekilis">
                            <i class="icofont-bullhorn"></i>
                            <span class="link-title">Çekiliş Sayfası</span>
                        </a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Sidebar Body -->
        </nav>
        <!-- End Sidebar -->
        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-30">
                            <div class="card-body pt-30">
                                <h4 class="font-20 ">Linqi Kayıtları</h4>
                                <div class="right-top col-6">
                                    <div class="input-group addon radius-50 ov-hidden">
                                        <input id="table2Search" type="text" class="form-control style--two" placeholder="İsim Ara">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light pointer">
                                                <img src="assets/img/svg/search-icon.svg" alt="" class="svg">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="table2" class="text-nowrap dh-table">
                                    <thead class="bg-3rd">
                                    <tr>
                                        <th>#</th>
                                        <th>İsim</th>
                                        <th>E-posta</th>
                                        <th>Telefon</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
    <!-- End Main Wrapper -->
    <!-- Footer -->
    <footer class="footer">
        GDG - WTM Kütahya © 2024 created by &nbsp;<a href="https://miellastudio.com/"> Miella Studio</a>
    </footer>
    <!-- End Footer -->
</div>
<!-- End wrapper -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const table2Body = document.querySelector("#table2 tbody");
        const searchInput = document.querySelector("#table2Search");

        function fetchTable2Data(query = "") {
            fetch(`includes/getTable2Records.php?q=${query}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        renderTable2(data.data);
                    } else {
                        console.error("Veri alma hatası:", data.error);
                    }
                })
                .catch((error) => console.error("Fetch hatası:", error));
        }

        function renderTable2(records) {
            table2Body.innerHTML = "";
            records.forEach((record, index) => {
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${record.name}</td>
                    <td>${record.email}</td>
                    <td>${record.gsm}</td>
                `;

                table2Body.appendChild(row);
            });
        }

        searchInput.addEventListener("input", function () {
            fetchTable2Data(this.value);
        });

        fetchTable2Data();
    });
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>