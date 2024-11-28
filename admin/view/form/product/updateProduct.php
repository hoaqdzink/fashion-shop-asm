<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Update Product</h2>
        </div>
        <?php 
            //var_dump($product);
           //var_dump($size_product)
        ?>
        <div class="card-body">
            <form action="index.php?act=product_update" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="hidden" name="id" value="<?=$product['product_id']?>">
                            <input type="text" name="name" class="form-control" value="<?=$product['name']?>" id="productName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control" id="price" value="<?=$product['price']?>" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="originalPrice" class="form-label">Giá gốc</label>
                            <input type="number" name="original_price" class="form-control" value="<?=$product['original_price']?>" id="originalPrice" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="discountPercentage" class="form-label">Giảm giá %</label>
                            <input type="number" name="discount_percentage" class="form-control" value="<?=$product['discount_percentage']?>" id="discountPercentage" min="0" max="100" step="0.1">
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" value="<?$product['description']?>" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Màu sắc</label>
                                    <select class="form-select" name="color" id="category" required>
                                        <option value="">Chọn màu sắc</option>
                                        <?php
                                            if(isset($colors) && count($colors) > 1){
                                                foreach ($colors as $color) {
                                                    if($color['color_id'] == $product['color_id']){
                                                        echo '<option value="'.$color['color_id'].'" style="background-color: '.$color['hex_code'].';" selected>'.$color['name'].'</option>';
                                                    }else{
                                                        echo '<option value="'.$color['color_id'].'" style="background-color: '.$color['hex_code'].';">'.$color['name'].'</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Sizes</label>
                                    
                                    <div>
                                        <?php
                                            if (isset($size) && count($size) > 0) {
                                                foreach ($size as $sz) {
                                                    // Kiểm tra xem size_id có trong mảng $size_product không
                                                    $checked = false;
                                                    foreach ($size_product as $product_size) {
                                                        if ($product_size['size_id'] == $sz['size_id']) {
                                                            $checked = true;
                                                            break;
                                                        }
                                                    }
                                                    // Nếu tìm thấy size_id trong $size_product, đánh dấu checkbox là checked
                                                    $checkedAttr = $checked ? 'checked' : '';
                                            
                                                    // Hiển thị checkbox
                                                    echo '
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="size[]" type="checkbox" id="size' . $sz['size_id'] . '" value="' . $sz['size_id'] . '" ' . $checkedAttr . '>
                                                            <label class="form-check-label" for="size' . $sz['size_id'] . '">' . $sz['name'] . '</label>
                                                        </div>
                                                    ';
                                                }
                                            }
                                        ?>
                                    </div>
                                            
                                </div>
                            </div>
                        </div>
                       
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-select" name="category_id" id="category" required>
                                <option value="">Chọn một danh mục</option>
                                <?php 
                                    //var_dump($category);
                                    if (isset($category) && count($category) > 0) {
                                        foreach ($category as $item) {
                                            if($item['category_id'] == $product['category_id']){
                                                echo '
                                                <option value="'.$item['category_id'].'" selected>'.$item['name'].'</option>';
                                            }else{
                                                echo '
                                                <option value="'.$item['category_id'].'">'.$item['name'].'</option>';
                                            }
                                            
                                        }
                                    }
                                ?>    
                            </select>
                        </div>
                        <div class="md3">
                            <label for="mainImage" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="main_image" class="form-control" id="mainImage" accept="image/*">
                        </div>
                        <div class="md3">
                            <img src="<?= $product['main_image'] ?>" class="img-fluid" alt="Product Image">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="product_update" value="submit" class="btn btn-secondary">Sửa sản phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>