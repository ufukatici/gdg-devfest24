<?php
include 'db.php';

header('Content-Type: application/json');

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$id = isset($data['id']) ? intval($data['id']) : null;
$field = isset($data['field']) ? $data['field'] : null;
$value = isset($data['value']) ? intval($data['value']) : null;

if ($id && $field && ($field === 'status' || $field === 'success')) {
    $sql = "UPDATE employee SET $field = :value WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":value", $value, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Veritabanı güncellenemedi."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Geçersiz parametreler."]);
}
?>
