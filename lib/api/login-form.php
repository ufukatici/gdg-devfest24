<?php
include $_SERVER['DOCUMENT_ROOT'] . '/lib/settings/db.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: /admin");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user-name'];
    $password = $_POST['passwd'];
    
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        header("Location: /admin");
        exit();
    } else {
        $_SESSION['login-error'] = "Geçersiz kullanıcı adı veya şifre!";
        header("Location: /login");
        exit();
    }
} else {
    $_SESSION['login-error'] = "Bilinmeyen hata, tekrar deneyiniz!";
    header("Location: /login");
    exit();
}