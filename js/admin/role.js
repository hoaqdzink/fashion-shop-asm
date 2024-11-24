const editDialogRole = document.getElementById("editDialog-role-list");
const editFormRole = document.getElementById("editForm-role-list");
const cancelButtonRole = document.getElementById("cancelButton-role-list");

document.querySelectorAll(".edit-button-role-list").forEach(button => {
    button.addEventListener("click", (e) => {
        const row = e.target.closest("tr");
        const roleId = row.querySelector(".td-role-list:first-child").textContent;
        const roleName = row.querySelector(".td-role-list:nth-child(2)").textContent;

        document.getElementById("editRoleId-role-form").value = roleId.trim();
        document.getElementById("editRoleName-role-form").value = roleName.trim();

        editDialogRole.style.display = "flex";
    });
});

cancelButtonRole?.addEventListener("click", () => {
    editDialogRole.style.display = "none";
});

editFormRole?.addEventListener("submit", (e) => {
    e.preventDefault();

    const roleId = document.getElementById("editRoleId-role-form").value;
    const roleName = document.getElementById("editRoleName-role-form").value;

    fetch(`${BASE_URL}/view/form/editRole.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            role_id: roleId,
            name: roleName
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Role updated successfully!");
            location.reload();
        } else {
            alert("Failed to update role: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    editDialogRole.style.display = "none";
});

// Các phần tử liên quan đến dialog thêm mới
const addDialogRole = document.getElementById("addDialog-role-list");
const addFormRole = document.getElementById("addForm-role-list");
const addButtonRole = document.getElementById("addButton-role-list");
const cancelAddButtonRole = document.getElementById("cancelAddButton-role-list");

// Hiển thị dialog thêm mới khi nhấn nút
addButtonRole?.addEventListener("click", () => {
    addDialogRole.style.display = "flex";
});

// Hủy thêm mới và ẩn dialog
cancelAddButtonRole?.addEventListener("click", () => {
    addDialogRole.style.display = "none";
});

// Gửi yêu cầu thêm mới danh mục
addFormRole?.addEventListener("submit", (e) => {
    e.preventDefault();

    const roleName = document.getElementById("addRoleName-role-form").value;

    fetch(`${BASE_URL}/view/form/addRole.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ name: roleName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Role added successfully!");
            location.reload();
        } else {
            alert("Failed to add role: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    addDialogRole.style.display = "none";
});