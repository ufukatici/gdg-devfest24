<?php
include $_SERVER['DOCUMENT_ROOT'] . '/lib/settings/db.php';

if (!$conn) {
    die(json_encode(['success' => false, 'error' => 'Veritabanı bağlantısı başarısız.']));
}


try {
    $query = "SELECT COUNT(*) AS total_users FROM employee WHERE status = 0";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalUsers = $result['total_users'];

    $_SESSION['total_users'] = $totalUsers;

    json_encode([
        'success' => true,
        'total_users' => $totalUsers
    ]);
} catch (Exception $e) {
    json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

$conn = null;

