<?php
// echo json_encode($billDetails, JSON_PRETTY_PRINT);

$total = 0;

foreach ($billDetails as $item) {
    $total += $item['Price'] * $item['Quantity'];
}
?>
<div class="container mt-4">
    <h2 class="mb-4 text-center bill-detail-title">Chi tiết hóa đơn</h2>
    <div class="table-responsive bill-detail-table-container">
        <table class="table bill-detail-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Tên</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($billDetails)): ?>
                    <?php
                    foreach ($billDetails as $item): ?>
                        <tr class="bill-detail-row">
                            <td data-label="Product">
                                <img src="<?= $item['Image'] ?>" alt="Product 1" class="bill-detail-image">
                            </td>
                            <td data-label="Name" class="bill-detail-name"><?= $item['ProductName'] ?></td>
                            <td data-label="Size" class="bill-detail-size"><?= $item['SizeName'] ?></td>
                            <td data-label="Color" class="bill-detail-color"><?= $item['ColorName'] ?></td>
                            <td data-label="Price" class="bill-detail-price"><?= number_format($item['Price'], 0, ',', '.') ?> VNĐ</td>
                            <td data-label="Quantity" class="bill-detail-quantity"><?= $item['Quantity'] ?></td>
                            <td data-label="Total" class="bill-detail-total"><?= number_format($item['Price'] * $item['Quantity'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php

                    endforeach; ?>
                <?php else: ?>
                    <tr>Có vẻ như đơn hàng bạn tìm đã có lỗi</tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr class="bill-detail-total-row">
                    <td colspan="6" class="text-end"><strong>Tổng tiền:</strong></td>
                    <td class="bill-detail-grand-total"><strong><?= number_format($total, 0, ',', '.') ?> VNĐ</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>