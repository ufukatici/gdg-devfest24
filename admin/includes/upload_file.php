<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$targetDir = "certificatesData/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Eğer dizin yoksa oluştur
}

$targetFile = $targetDir . basename($_FILES['file']['name']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Dosya yüklenirken hata oluştu.']);
}
