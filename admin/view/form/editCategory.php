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
    $categoryId = $input['category_id'] ?? null;
    $categoryName = $input['name'] ?? null;

    if (!$categoryId || !$categoryName) {
        echo json_encode(['success' => false, 'error' => 'Dữ liệu không hợp lệ']);
        exit;
    }

    try {
        $sql = "UPDATE categories SET name = :name WHERE category_id = :category_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $categoryName,
            ':category_id' => $categoryId
        ]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Phương thức yêu cầu không hợp lệ']);
}
?>
