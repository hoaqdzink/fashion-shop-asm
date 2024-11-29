<?php
    function checkInsert() {
        try {
            if (isset($_POST['createProduct']) && $_POST['createProduct']) {
                // Lấy dữ liệu từ form
                $name = $_POST['name'];
                $price = $_POST['price'];
                $original_price = $_POST['original_price'];
                $discount_percentage = $_POST['discount_percentage'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                $color_id = $_POST['color'];
                $user_id = 1;
                $size = isset($_POST['size']) ? $_POST['size'] : [];

                if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
                    // Tải ảnh lên S3 và lấy URL của ảnh
                    $main_image_url = uploadImageToS3($_FILES['main_image']);
                    if (!$main_image_url) {
                        echo "Lỗi khi tải ảnh sản phẩm lên S3.<br>";
                        return;
                    }
                } else {
                    echo "Lỗi khi tải ảnh sản phẩm.<br>";
                    return;
                }


                $product_id = insertProduct($name, $price, $original_price, $discount_percentage, $main_image_url, $description, $color_id,$category_id, $user_id);

                $sub_images = [];
                if (isset($_FILES['subImg']) && $_FILES['subImg']['error'][0] == 0) {
                    // Lặp qua từng ảnh và tải lên S3
                    foreach ($_FILES['subImg']['tmp_name'] as $key => $tmp_name) {
                        // Upload ảnh lên S3 và lấy URL
                        $sub_image_url = uploadImageToS3([
                            'name' => $_FILES['subImg']['name'][$key],
                            'tmp_name' => $tmp_name,
                        ]);
                
                        if ($sub_image_url) {
                            $sub_images[] = $sub_image_url;
                        } else {
                            echo "Failed to upload image: " . $_FILES['subImg']['name'][$key] . "<br>";
                        }
                    }
                
                    if (!empty($sub_images)) {                    
                        foreach ($sub_images as $sub_image_url) {
                            insertProductSubImage($product_id, $sub_image_url);
                        }
                    } else {
                        echo 'Không có ảnh nào được tải lên thành công.<br>';
                    }
                }

                if (!empty($size)) {
                    foreach ($size as $size_id) {
                        insertProductSize($product_id, $size_id);
                    }
                }
                            
                if (!$product_id) {
                    echo '<h4 style="color: red;">Lỗi: Không thể thêm sản phẩm.<br></h4>';
                } else {
                    echo '<h4 style="color: green;">Sản phẩm đã được thêm thành công với ID: ' .$product_id. '</h4><br>';
                }
            } else {
                print "Dữ liệu POST không hợp lệ hoặc không có yêu cầu thêm sản phẩm.<br>";
            }
        } catch (Exception $e) {
            print "Lỗi ngoại lệ: " . $e->getMessage() . "<br>";
        }

        getAllProducts();
        header('location: index.php?act=list_product');
    }

    function deleteProduct(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            deleteProductById($id);
        }
        getAllProducts();
        header('location: index.php?act=list_product');
        exit();
    }

    function update_product_by_id(){
        if(isset($_POST['product_update']) && ($_POST['product_update'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $original_price = $_POST['original_price'];
            $discount_percentage = $_POST['discount_percentage'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $color_id = $_POST['color'];
            $size = isset($_POST['size']) ? $_POST['size'] : [];

            if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
                $main_image_url = uploadImageToS3($_FILES['main_image']);
                if (!$main_image_url) {
                    echo "Lỗi khi tải ảnh sản phẩm lên S3.<br>";
                    return;
                }
            } else {
                $product = getByProductId($id);
                if ($product) {
                    $main_image_url = $product['main_image']; // Giữ lại ảnh cũ
                } else {
                    echo "Không tìm thấy sản phẩm để cập nhật.<br>";
                    return;
                }
            }
            updateProductById($id, $name, $price, $original_price, $discount_percentage, $main_image_url, $description, $category_id, $color_id);

            if (!empty($size)) {
                deleteProductSizes($id); // Xóa các kích thước cũ trước
                foreach ($size as $size_id) {
                    insertProductSize($id, $size_id);
                }
            }
            
            echo '<h4 style="color: green;">Sản phẩm đã được cập nhật thành công.</h4><br>';
            
            header('location: index.php?act=editProduct&id='.$id);
        }else{
            echo '<h4 style="color: red;">Dữ liệu POST không hợp lệ hoặc không có yêu cầu cập nhật.</h4><br>';
        }
    }
?>
