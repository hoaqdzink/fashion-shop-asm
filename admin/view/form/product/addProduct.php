<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Add New Product</h2>
        </div>
        <div class="card-body">
            <form action="index.php?act=addProduct" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="productName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="originalPrice" class="form-label">Giá gốc</label>
                            <input type="number" name="original_price" class="form-control" id="originalPrice" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="discountPercentage" class="form-label">Giảm giá %</label>
                            <input type="number" name="discount_percentage" class="form-control" id="discountPercentage" min="0" max="100" step="0.1">
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        
                        <div class="mb-3">
                            <label class="form-label">Màu sắc</label>
                            <select class="form-select" name="color" id="category" required>
                                <option value="">Chọn màu sắc</option>
                                <?php
                                    //var_dump($colors);
                                    if(isset($colors) && count($colors) > 1){
                                        foreach ($colors as $color) {
                                            echo '<option value="'.$color['color_id'].'" style="background-color: '.$color['hex_code'].';">'.$color['name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Sizes</label>
                            
                            <div>
                                <?php
                                    //var_dump($size);
                                    if(isset($size) && count($size) > 1){
                                        foreach($size as $sz){
                                            echo '
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="size[]" type="checkbox" id="sizeXS" value="'.$sz['size_id'].'">
                                                    <label class="form-check-label" for="sizeXS">'.$sz['name'].'</label>
                                                </div>
                                            ';
                                        }
                                    }
                                ?>
                            </div>
                                    
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-select" name="category_id" id="category" required>
                                <option value="">Chọn một danh mục</option>
                                <?php 
                                    //var_dump($category);
                                    if (isset($category) && count($category) > 1) {
                                        foreach ($category as $item) {
                                            echo '
                                                <option value="'.$item['category_id'].'">'.$item['name'].'</option>';
                                        }
                                    }
                                ?>    
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mainImage" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="main_image" class="form-control" id="mainImage" accept="image/*" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="additionalImages" class="form-label">5 ảnh mô tả</label>
                            <input type="file" name="subImg[]" class="form-control" id="additionalImages" accept="image/*" multiple>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="createProduct" value="submit" class="btn btn-secondary">Thêm sản phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>