<?php
include $_SERVER['DOCUMENT_ROOT'] . '/lib/settings/db.php';
session_start();
ob_start();

if (!isset($_POST['name'], $_POST['email'], $_POST['number']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['number'])) {
    $_SESSION['message'] = "Kayıt hatası. Lütfen bütün bilgilerinizi giriniz.";
    header('Location: /kontrol');
    exit();
}

$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$number = preg_replace('/[^0-9]/', '', $_POST['number']);
$status = 1;

if (!$email) {
    $_SESSION['message'] = "Geçersiz e-posta adresi.";
    header('Location: /kontrol');
    exit();
}

try {
    $checkSql = "SELECT * FROM employee WHERE name = :name OR email = :email OR gsm = :gsm";
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

    $sql = "INSERT INTO employee (name, email, gsm, status) VALUES (:name, :email, :gsm, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gsm', $number);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    $_SESSION['message'] = "Kayıt Yapıldı.";
    header('Location: /kontrol');
    exit();

} catch (PDOException $e) {
    $_SESSION['message'] = "Kayıt hatası: " . $e->getMessage();
    header('Location: /kontrol');
    exit();
}
