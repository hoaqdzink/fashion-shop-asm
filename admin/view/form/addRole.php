<?php
session_start();
ob_start();
$repositoryConnection = realpath(__DIR__ . '/../../../repository/connect.php');
require_once $repositoryConnection;

$conn = connect();

if (!$conn) {
    echo "12313";
    die(json_encode(['conn' => $conn, 'error' => 'Fail']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $roleName = $input['name'] ?? null;

    if (!$roleName) {
        echo json_encode(['success' => false, 'error' => 'Dữ liệu không hợp lệ']);
        exit;
    }

    try {
        $sql = "INSERT INTO roles (role_name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $roleName
        ]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
