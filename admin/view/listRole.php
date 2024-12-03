<body class="body-role-list">
    <?php

    $repositoryConnection = realpath(__DIR__ . '/../../repository/connect.php');

    require_once $repositoryConnection;
    $conn = connect();
    try {
        $sql = "SELECT * FROM Roles";
        $stmt = $conn->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p class='error-message'>Lỗi khi truy vấn database: " . htmlspecialchars($e->getMessage()) . "</p>";
        $categories = [];
    }
    ?>



    
    <h1>Danh sách Role</h1>
    <button id="addButton-role-list" class="button-role-list button-role-list-add-new ">Thêm mới</button>
    <table class="table-role-list">
        <thead>
            <tr class="tr-role-list">
                <th class="th-role-list">ID</th>
                <th class="th-role-list">Tên</th>
                <th class="th-role-list">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $role): ?>
                    <tr class="tr-role-list">
                        <td class="td-role-list"><?= htmlspecialchars($role['role_id']) ?></td>
                        <td class="td-role-list"><?= htmlspecialchars($role['role_name']) ?></td>
                        <td class="td-role-list actions-role-list">
                            <button class="button-role-list edit-button-role-list">Chỉnh sửa</button>
                            <a href="index.php?act=deleteRole&id=<?= htmlspecialchars($role['role_id']) ?>" class="button-size-list button-delete-size-list">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="tr-role-list">
                    <td colspan="3" class="td-role-list">Không có role nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>



<!-- Dialog -->
<div id="editDialog-role-list" class="dialog-role-list">
    <div class="dialog-content-role-list">
        <h2 class="dialog-title-role-list">Chỉnh sửa role</h2>
        <form id="editForm-role-list" class="form-role-list">
            <input type="hidden" id="editRoleId-role-form" name="role_id" />
            <div class="form-group-role-list">
                <label for="editRoleName-role-form" class="label-role-list">Tên</label>
                <input type="text" id="editRoleName-role-form" name="name" class="input-role-list"
                    required />
            </div>
            <div class="dialog-actions-role-list">
                <button type="submit" class="button-role-list">Lưu</button>
                <button type="button" id="cancelButton-role-list" class="button-role-list button-delete-role-list">Thoát</button>
            </div>
        </form>
    </div>
</div>

<!-- Dialog Thêm Mới -->

<!-- Dialog Thêm Mới -->
<div id="addDialog-role-list" class="dialog-role-list">
    <div class="dialog-content-role-list">
        <h3>Add New Role</h3>
        <form id="addForm-role-list">
            <label for="addRoleName-role-form">Tên:</label>
            <input
                type="text"
                id="addRoleName-role-form"
                class="input-role-list"
                name="roleName"
                placeholder="Enter role name"
                required
            >
            <div class="dialog-actions-role-list">
                <button type="submit" class="button-role-list">Thêm mới</button>
                <button type="button" id="cancelAddButton-role-list" class="button-role-list button-delete-role-list">Thoát</button>
            </div>
        </form>
    </div>
</div>
