<?php
include 'db.php';

header('Content-Type: application/json');

$query = isset($_GET['q']) ? $_GET['q'] : "";

$sql = "SELECT id, name, email, gsm FROM participant WHERE name LIKE :query";
$stmt = $conn->prepare($sql);
$search = "%" . $query . "%";
$stmt->bindParam(':query', $search, PDO::PARAM_STR);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($data) {
    echo json_encode(["success" => true, "data" => $data]);
} else {
    echo json_encode(["success" => false, "error" => "Kayıt bulunamadı."]);
}
?>
