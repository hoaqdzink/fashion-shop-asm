<?php
session_start();
ob_start();
$repositoryConnection = realpath(__DIR__ . '/../../../repository/connect.php');
require_once $repositoryConnection;

$conn = connect();

if (!$conn) {
    die(json_encode(['conn' => $conn, 'error' => 'Fail']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $sizeId = $input['size_id'] ?? null;
    $sizeName = $input['name'] ?? null;

    if (!$sizeId || !$sizeName) {
        echo json_encode(['success' => false, 'error' => 'Dữ liệu không hợp lệ']);
        exit;
    }

    try {
        $sql = "UPDATE sizes SET name = :name WHERE size_id = :size_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $sizeName,
            ':size_id' => $sizeId
        ]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
