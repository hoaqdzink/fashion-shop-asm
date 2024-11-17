<body class="body-category-list">
    <?php

    $repositoryConnection = realpath(__DIR__ . '/../../repository/connect.php');

    require $repositoryConnection;
    $conn = connect();
    try {
        $sql = "SELECT * FROM categories";
        $stmt = $conn->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p class='error-message'>Lỗi khi truy vấn database: " . htmlspecialchars($e->getMessage()) . "</p>";
        $categories = [];
    }
    ?>



    <!-- Nút Thêm Mới -->
    
    <h1>Danh sách danh mục</h1>
    <button id="addButton-category-list" class="button-category-list button-category-list-add-new ">Thêm mới</button>
    <table class="table-category-list">
        <thead>
            <tr class="tr-category-list">
                <th class="th-category-list">ID</th>
                <th class="th-category-list">Tên</th>
                <th class="th-category-list">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr class="tr-category-list">
                        <td class="td-category-list"><?= htmlspecialchars($category['category_id']) ?></td>
                        <td class="td-category-list"><?= htmlspecialchars($category['name']) ?></td>
                        <td class="td-category-list actions-category-list">
                            <button class="button-category-list edit-button-category-list">Chỉnh sửa</button>
                            <button class="button-category-list button-delete-category-list">Xóa</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="tr-category-list">
                    <td colspan="3" class="td-category-list">Không có danh mục nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>



<!-- Dialog -->
<div id="editDialog-category-list" class="dialog-category-list">
    <div class="dialog-content-category-list">
        <h2 class="dialog-title-category-list">Chỉnh sửa danh mục</h2>
        <form id="editForm-category-list" class="form-category-list">
            <input type="hidden" id="editCategoryId-category-form" name="category_id" />
            <div class="form-group-category-list">
                <label for="editCategoryName-category-form" class="label-category-list">Tên</label>
                <input type="text" id="editCategoryName-category-form" name="name" class="input-category-list"
                    required />
            </div>
            <div class="dialog-actions-category-list">
                <button type="button" id="cancelButton-category-list" class="button-category-list">Thoát</button>
                <button type="submit" class="button-category-list">Lưu</button>
            </div>
        </form>
    </div>
</div>

<!-- Dialog Thêm Mới -->

<!-- Dialog Thêm Mới -->
<div id="addDialog-category-list" class="dialog-category-list">
    <div class="dialog-content-category-list">
        <h3>Add New Category</h3>
        <form id="addForm-category-list">
            <label for="addCategoryName-category-form">Tên:</label>
            <input
                type="text"
                id="addCategoryName-category-form"
                class="input-category-list"
                name="categoryName"
                placeholder="Enter category name"
                required
            >
            <div class="dialog-actions-category-list">
                <button type="submit" class="button-category-list">Thêm mới</button>
                <button type="button" id="cancelAddButton-category-list" class="button-category-list button-delete-category-list">Thoát</button>
            </div>
        </form>
    </div>
</div>
