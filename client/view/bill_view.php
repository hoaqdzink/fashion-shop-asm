<?php

if (!isset($_SESSION['idUser'])) {
    header('Location: index.php?act=login');
    exit();
}

$repositoryConnection = realpath(__DIR__ . '/../../repository/connect.php');

require_once $repositoryConnection;
$conn = connect();
try {



    $sql = "SELECT * FROM bill";
    $stmt = $conn->query($sql);
    $bill = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($bill, JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    echo "<p class='error-message'>Lỗi khi truy vấn database: " . htmlspecialchars($e->getMessage()) . "</p>";
    $bill = [];
}
?>




<div class="container mt-5">
    <h1 class="mb-4">Lịch sử mua hàng của bạn</h1>
    <div class="">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bill)): ?>
                    <?php foreach ($bill as $item): ?>
                        <tr>
                            <td><?= date("d-m-Y", strtotime($item['created_date']))  ?></td>
                            <td><?= number_format($item['totalAmount'], 0, ',', '.') ?> VNĐ</td>
                            <td>
                                <div class="dropdown">
                                    <a href="index.php?act=bill-details&billId=<?= $item['id'] ?>">
                                        <button class="btn btn-secondary btn-sm" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                            <span>Chi tiết</span>
                                        </button>
                                    </a>
                                    <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">View</a></li>
                                </ul> -->
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>Bạn chưa mua gì cả</tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>