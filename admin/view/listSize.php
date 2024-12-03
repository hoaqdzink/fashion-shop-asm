<body class="body-size-list">
    <?php

    $repositoryConnection = realpath(__DIR__ . '/../../repository/connect.php');

    require_once $repositoryConnection;
    $conn = connect();
    try {
        $sql = "SELECT * FROM Sizes";
        $stmt = $conn->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p class='error-message'>Lỗi khi truy vấn database: " . htmlspecialchars($e->getMessage()) . "</p>";
        $categories = [];
    }
    ?>



    
    <h1>Danh sách Size</h1>
    <button id="addButton-size-list" class="button-size-list button-size-list-add-new ">Thêm mới</button>
    <table class="table-size-list">
        <thead>
            <tr class="tr-size-list">
                <th class="th-size-list">ID</th>
                <th class="th-size-list">Tên</th>
                <th class="th-size-list">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $size): ?>
                    <tr class="tr-size-list">
                        <td class="td-size-list"><?= htmlspecialchars($size['size_id']) ?></td>
                        <td class="td-size-list"><?= htmlspecialchars($size['name']) ?></td>
                        <td class="td-size-list actions-size-list">
                            <button class="button-size-list edit-button-size-list">Chỉnh sửa</button>
                            <a href="index.php?act=deleteSize&id=<?= htmlspecialchars($size['size_id']) ?>" class="button-size-list button-delete-size-list">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="tr-size-list">
                    <td colspan="3" class="td-size-list">Không có Size nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>



<!-- Dialog -->
<div id="editDialog-size-list" class="dialog-size-list">
    <div class="dialog-content-size-list">
        <h2 class="dialog-title-size-list">Chỉnh sửa Size</h2>
        <form id="editForm-size-list" class="form-size-list">
            <input type="hidden" id="editSizeId-size-form" name="size_id" />
            <div class="form-group-size-list">
                <label for="editSizeName-size-form" class="label-size-list">Tên</label>
                <input type="text" id="editSizeName-size-form" name="name" class="input-size-list"
                    required />
            </div>
            <div class="dialog-actions-size-list">
                <button type="submit" class="button-size-list">Lưu</button>
                <button type="button" id="cancelButton-size-list" class="button-size-list button-delete-size-list">Thoát</button>
            </div>
        </form>
    </div>
</div>

<!-- Dialog Thêm Mới -->

<!-- Dialog Thêm Mới -->
<div id="addDialog-size-list" class="dialog-size-list">
    <div class="dialog-content-size-list">
        <h3>Add New Size</h3>
        <form id="addForm-size-list">
            <label for="addSizeName-size-form">Tên:</label>
            <input
                type="text"
                id="addSizeName-size-form"
                class="input-size-list"
                name="sizeName"
                placeholder="Enter size name"
                required
            >
            <div class="dialog-actions-size-list">
                <button type="submit" class="button-size-list">Thêm mới</button>
                <button type="button" id="cancelAddButton-size-list" class="button-size-list button-delete-size-list">Thoát</button>
            </div>
        </form>
    </div>
</div>
