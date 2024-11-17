<?php
session_start();
ob_start();
$repositoryConnection = realpath(__DIR__ . '/../../../repository/connect.php');
require $repositoryConnection;


$conn = connect();

if (!$conn) {
    die(json_encode(['conn' => $conn, 'error' => 'Fail']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $roleId = $input['role_id'] ?? null;
    $roleName = $input['name'] ?? null;

    if (!$roleId || !$roleName) {
        echo json_encode(['success' => false, 'error' => 'Dữ liệu không hợp lệ']);
        exit;
    }

    try {
        $sql = "UPDATE roles SET role_name = :name WHERE role_id = :role_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $roleName,
            ':role_id' => $roleId
        ]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
