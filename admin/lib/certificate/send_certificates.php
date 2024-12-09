<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
include __DIR__ . '/send_email.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

try {
    $filePath = __DIR__ . '/../../includes/certificatesData/katilimcilar.xlsx';
    if (!file_exists($filePath)) {
        throw new Exception("Excel dosyası bulunamadı: $filePath");
    }
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray();
} catch (Exception $e) {
    die("Hata: " . $e->getMessage());
}

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function create_and_send_certificate($name, $email) {
    $templatePath = __DIR__ . '/../../assets/img/sertifika_sablonu.png'; 
    $fontPath = __DIR__ . '/../../assets/fonts/PhotographSignature.ttf';
    $outputDir = __DIR__ . '/../../certificates'; 
    

    if (!file_exists($templatePath)) {
        throw new Exception("Sertifika şablonu bulunamadı: $templatePath");
    }
    if (!file_exists($fontPath)) {
        throw new Exception("Font dosyası bulunamadı: $fontPath");
    }
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true); 
    }

    $template = imagecreatefrompng($templatePath);
    $textColor = imagecolorallocate($template, 0, 0, 0);
    $fontSize = 50;

    $imageWidth = imagesx($template);
    $imageHeight = imagesy($template); 

    $bbox = imagettfbbox($fontSize, 0, $fontPath, $name);
    $textWidth = abs($bbox[2] - $bbox[0]);
    $textHeight = abs($bbox[7] - $bbox[1]);

    $x = ($imageWidth - $textWidth) / 2; 
    $y = ($imageHeight - $textHeight) / 2 + $textHeight;

    imagettftext($template, $fontSize, 0, $x, $y, $textColor, $fontPath, $name);

    $outputFile = $outputDir . '/' . str_replace(' ', '_', $name) . '_sertifika.png';
    imagepng($template, $outputFile);
    imagedestroy($template); 

    send_email($email, "Etkinlik Sertifikaniz", 
        "Merhaba $name,\n\nEtkinliğe katıldığınız için teşekkür ederiz. Sertifikanız ekli dosyada bulunmaktadır.",
        $outputFile
    );
}


foreach ($data as $row) {
    $name = isset($row[0]) ? $row[1] : null; 
    $email = isset($row[1]) ? $row[2] : null;

    if (!$name || !$email) {
        echo "Eksik bilgi: Ad veya e-posta bulunamadı. Veri: " . json_encode($row) . "<br>";
        continue;
    }

    if (!is_valid_email($email)) {
        echo "Geçersiz e-posta adresi: $email<br>";
        continue;
    }

    try {
        create_and_send_certificate($name, $email);
        echo "Sertifika gönderildi: $name ($email)<br>";
    } catch (Exception $e) {
        echo "Hata oluştu: " . $e->getMessage() . " Ad: $name, E-posta: $email<br>";
    }
}

echo "Tüm işlemler tamamlandı.";
