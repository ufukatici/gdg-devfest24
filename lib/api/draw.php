<?php

include $_SERVER['DOCUMENT_ROOT'] . '/lib/settings/db.php';

if (!$conn) {
    die(json_encode(['success' => false, 'error' => 'Veritabanı bağlantısı başarısız.']));
}

header('Content-Type: application/json');

try {
    $conn->beginTransaction();

    $selectQuery = "
        SELECT id, name 
        FROM employee 
        WHERE status = 0
        ORDER BY RAND() 
        LIMIT 1
    ";

    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->execute();

    if ($selectStmt->rowCount() > 0) {
        $user = $selectStmt->fetch(PDO::FETCH_ASSOC);
        $userId = $user['id'];
        $userName = $user['name'];

        $updateQuery = "
            UPDATE employee
            SET status = 1
            WHERE id = :userId
        ";

        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $updateStmt->execute();

        $conn->commit();
        echo json_encode(['success' => true, 'name' => $userName]);
    } else {
        throw new Exception("Aktif durumdaki uygun kayıt bulunamadı.");
    }
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
}

$conn = null;

