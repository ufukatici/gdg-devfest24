<?php
include 'db.php';

header('Content-Type: application/json');

$query = isset($_GET['q']) ? trim($_GET['q']) : "";

$sql = "SELECT id, name, email, gsm, status, success FROM employee";
if (!empty($query)) {
    $sql .= " WHERE name LIKE :query OR email LIKE :query OR gsm LIKE :query";
}

$sql .= " ORDER BY status DESC, id ASC";

$stmt = $conn->prepare($sql);

if (!empty($query)) {
    $stmt->bindValue(":query", "%$query%", PDO::PARAM_STR);
}

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($data) {
    echo json_encode(["success" => true, "data" => $data]);
} else {
    echo json_encode(["success" => false, "error" => "Kayıt bulunamadı."]);
}
?>
