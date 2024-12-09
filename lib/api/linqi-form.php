<?php
include $_SERVER['DOCUMENT_ROOT'] . '/lib/settings/db.php';
session_start();
ob_start();

if (!isset($_POST['name'], $_POST['email'], $_POST['number']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['number'])) {
    $_SESSION['message'] = "Kayıt hatası. Lütfen bütün bilgilerinizi giriniz.";
    header('Location: /kontrol');
    exit();
}

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);

if (!$email) {
    $_SESSION['message'] = "Geçersiz e-posta adresi.";
    header('Location: /kontrol');
    exit();
}

try {
    $checkSql = "SELECT * FROM linqi WHERE name = :name OR email = :email OR gsm = :gsm";
    $stmt = $conn->prepare($checkSql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gsm', $number);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        $_SESSION['message'] = "Bu kullanıcı zaten kayıtlı!";
        header('Location: /kontrol');
        exit();
    }

    $sql = "INSERT INTO linqi (name, email, gsm) VALUES (:name, :email, :gsm)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gsm', $number);
    $stmt->execute();

    $_SESSION['message'] = "Kayıt Yapıldı.";
    header('Location: /kontrol');
    exit();

} catch (PDOException $e) {
    $_SESSION['message'] = "Kayıt hatası: " . $e->getMessage();
    header('Location: /kontrol');
    exit();
}
