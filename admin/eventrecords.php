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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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
                    <li class="active">
                        <a href="/admin/eventrecords.php">
                            <i class="icofont-bars"></i>
                            <span class="link-title">Etkinlik Kayıtları</span>
                        </a>
                        <ul class="nav sub-menu">
                            <li><a id="exportToExcel" href="#" >Tabloyu Dışa Aktar</a></li>
                        </ul>
                        <ul class="nav sub-menu">
                            <li><a id="send-certificates" onclick="sendCertificates()" href="#" >Sertifikaları Gönder</a></li>
                        </ul>
                    </li>
                    <li>
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
                                <h4 class="font-20 ">Etkinlik Kayıtları</h4>
                                <div class="right-top col-6">
                                    <div class="input-group addon radius-50 ov-hidden">
                                        <input id="Table3Search" type="text" class="form-control style--two" placeholder="İsim Ara">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light pointer">
                                                <img src="assets/img/svg/search-icon.svg" alt="" class="svg">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="Table3" class="text-nowrap dh-table">
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
    function sendCertificates() {
        fetch('lib/certificate/send_certificates.php')  // Sertifikaları gönderen PHP dosyasına istek gönder
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
            .catch(error => {
                alert('Hata oluştu: ' + error);
            });
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    fetchData();
});

const searchInput = document.querySelector("#Table3Search");
searchInput.addEventListener("input", (event) => {
    const query = event.target.value.trim();
    fetchData(query);
});

function fetchData(query = "") {
    fetch(`includes/getTable3Records.php?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                populateTable(data.data);
            } else {
                console.error("Hata:", data.error);
                populateTable([]);
            }
        })
        .catch(error => console.error("Fetch Hatası:", error));
}

function populateTable(records) {
    const tbody = document.querySelector("#Table3 tbody");
    tbody.innerHTML = "";

    if (records.length === 0) {
        tbody.innerHTML = `<tr><td colspan="4">Kayıt bulunamadı.</td></tr>`;
        return;
    }

    records.forEach((record, index) => {
        tbody.innerHTML += `
            <tr>
                <td>${index + 1}</td>
                <td>${record.name}</td>
                <td>${record.email}</td>
                <td>${record.gsm}</td>
            </tr>
        `;
    });
}
</script>
<script>
document.getElementById("exportToExcel").addEventListener("click", function () {
    const rows = [];
    const headers = ["#", "İsim", "E-posta", "Telefon"];
    rows.push(headers);

    document.querySelectorAll("#Table3 tbody tr").forEach((row) => {
        const cells = Array.from(row.children).map((cell) => cell.innerText);
        rows.push(cells);
    });

    const worksheet = XLSX.utils.aoa_to_sheet(rows);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Etkinlik Kayıtları");

    // Dosyayı indir
    XLSX.writeFile(workbook, "Etkinlik_Kayitlari.xlsx");

    // Excel dosyasını sunucuya yüklemek için dosyayı FormData ile gönder
    const file = XLSX.write(workbook, { bookType: "xlsx", type: "binary" });
    const blob = new Blob([s2ab(file)], { type: "application/octet-stream" });
    
    const formData = new FormData();
    formData.append('file', blob, 'katilimcilar.xlsx');

    // AJAX isteği ile dosyayı sunucuya gönder
    fetch('includes/upload_file.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        console.log("Sunucudan dönen veri:", data); // Sunucudan gelen veriyi kontrol edin
        try{
            const jsonData = JSON.parse(data); // Eğer veri geçerliyse JSON'a çevir
        if (jsonData.success) {
            console.log("Dosya sunucuya başarıyla yüklendi.");
        } else {
            console.error("Dosya yüklenirken hata oluştu.");
        }
        }catch (e) {
        console.error("JSON parse hatası:", e);
    }
        
    })
    .catch(error => {
        console.error("Yükleme hatası:", error);
    });
});

// Yardımcı fonksiyon: Binary veriyi ArrayBuffer'a çevirir
function s2ab(s) {
    const buf = new ArrayBuffer(s.length);
    const view = new Uint8Array(buf);
    for (let i = 0; i < s.length; i++) {
        view[i] = s.charCodeAt(i) & 0xFF;
    }
    return buf;
}
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>