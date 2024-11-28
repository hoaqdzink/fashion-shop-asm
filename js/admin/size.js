const editDialogSize = document.getElementById("editDialog-size-list");
const editFormSize = document.getElementById("editForm-size-list");
const cancelButtonSize = document.getElementById("cancelButton-size-list");

document.querySelectorAll(".edit-button-size-list").forEach(button => {
    button.addEventListener("click", (e) => {
        const row = e.target.closest("tr");
        const sizeId = row.querySelector(".td-size-list:first-child").textContent;
        const sizeName = row.querySelector(".td-size-list:nth-child(2)").textContent;

        document.getElementById("editSizeId-size-form").value = sizeId.trim();
        document.getElementById("editSizeName-size-form").value = sizeName.trim();

        editDialogSize.style.display = "flex";
    });
});

cancelButtonSize?.addEventListener("click", () => {
    editDialogSize.style.display = "none";
});

editFormSize?.addEventListener("submit", (e) => {
    e.preventDefault();

    const sizeId = document.getElementById("editSizeId-size-form").value;
    const sizeName = document.getElementById("editSizeName-size-form").value;

    fetch(`${BASE_URL}/view/form/editSize.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        // body: JSON.stringify({
        //     size_id: sizeId,
        //     name: sizeName
        // })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Size updated successfully!");
            location.reload();
        } else {
            alert("Failed to update size: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    editDialogSize.style.display = "none";
});

// Các phần tử liên quan đến dialog thêm mới
const addDialogSize = document.getElementById("addDialog-size-list");
const addFormSize = document.getElementById("addForm-size-list");
const addButtonSize = document.getElementById("addButton-size-list");
const cancelAddButtonSize = document.getElementById("cancelAddButton-size-list");

// Hiển thị dialog thêm mới khi nhấn nút
addButtonSize?.addEventListener("click", () => {
    addDialogSize.style.display = "flex";
});

// Hủy thêm mới và ẩn dialog
cancelAddButtonSize?.addEventListener("click", () => {
    addDialogSize.style.display = "none";
});

// Gửi yêu cầu thêm mới danh mục
addFormSize?.addEventListener("submit", (e) => {
    e.preventDefault();

    const sizeName = document.getElementById("addSizeName-size-form").value;

    fetch(`${BASE_URL}/view/form/addSize.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ name: sizeName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Size added successfully!");
            location.reload();
        } else {
            alert("Failed to add size: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));

    addDialogSize.style.display = "none";
});