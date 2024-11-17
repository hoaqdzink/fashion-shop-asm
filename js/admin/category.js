const editDialog = document.getElementById("editDialog-category-list");
const editForm = document.getElementById("editForm-category-list");
const cancelButton = document.getElementById("cancelButton-category-list");

document.querySelectorAll(".edit-button-category-list").forEach(button => {
    button.addEventListener("click", (e) => {
        const row = e.target.closest("tr");
        const categoryId = row.querySelector(".td-category-list:first-child").textContent;
        const categoryName = row.querySelector(".td-category-list:nth-child(2)").textContent;

        document.getElementById("editCategoryId-category-form").value = categoryId.trim();
        document.getElementById("editCategoryName-category-form").value = categoryName.trim();

        editDialog.style.display = "flex";
    });
});

cancelButton.addEventListener("click", () => {
    editDialog.style.display = "none";
});

editForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const categoryId = document.getElementById("editCategoryId-category-form").value;
    const categoryName = document.getElementById("editCategoryName-category-form").value;

    fetch("../../admin/view/form/editCategory.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            category_id: categoryId,
            name: categoryName
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Category updated successfully!");
            location.reload();
        } else {
            alert("Failed to update category: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    editDialog.style.display = "none";
});

// Các phần tử liên quan đến dialog thêm mới
const addDialog = document.getElementById("addDialog-category-list");
const addForm = document.getElementById("addForm-category-list");
const addButton = document.getElementById("addButton-category-list");
const cancelAddButton = document.getElementById("cancelAddButton-category-list");

// Hiển thị dialog thêm mới khi nhấn nút
addButton.addEventListener("click", () => {
    addDialog.style.display = "flex";
});

// Hủy thêm mới và ẩn dialog
cancelAddButton.addEventListener("click", () => {
    addDialog.style.display = "none";
});

// Gửi yêu cầu thêm mới danh mục
addForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const categoryName = document.getElementById("addCategoryName-category-form").value;

    fetch("../../admin/view/form/addCategory.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ name: categoryName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Category added successfully!");
            location.reload();
        } else {
            alert("Failed to add category: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    addDialog.style.display = "none";
});