<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Add New Product</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" required>
                                <option value="">Select a category</option>
                                <option value="1">Clothing</option>
                                <option value="2">Shoes</option>
                                <option value="3">Accessories</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="originalPrice" class="form-label">Original Price</label>
                            <input type="number" class="form-control" id="originalPrice" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="discountPercentage" class="form-label">Discount %</label>
                            <input type="number" class="form-control" id="discountPercentage" min="0" max="100" step="0.1">
                        </div>
                        
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" min="0" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating" min="0" max="5" step="0.1">
                        </div>
                        
                        <div class="mb-3">
                            <label for="reviewsCount" class="form-label">Reviews Count</label>
                            <input type="number" class="form-control" id="reviewsCount" min="0">
                        </div>
                        
                        <div class="mb-3">
                            <label for="brandId" class="form-label">Brand ID</label>
                            <input type="number" class="form-control" id="brandId" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Colors</label>
                            <div>
                                <input type="color" class="form-control form-control-color color-option" value="#ff0000" title="Choose product color">
                                <input type="color" class="form-control form-control-color color-option" value="#00ff00" title="Choose product color">
                                <input type="color" class="form-control form-control-color color-option" value="#0000ff" title="Choose product color">
                                <input type="color" class="form-control form-control-color color-option" value="#ffff00" title="Choose product color">
                                <input type="color" class="form-control form-control-color color-option" value="#000000" title="Choose product color">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Sizes</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sizeXS" value="XS">
                                    <label class="form-check-label" for="sizeXS">XS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sizeS" value="S">
                                    <label class="form-check-label" for="sizeS">S</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sizeM" value="M">
                                    <label class="form-check-label" for="sizeM">M</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sizeL" value="L">
                                    <label class="form-check-label" for="sizeL">L</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="sizeXL" value="XL">
                                    <label class="form-check-label" for="sizeXL">XL</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mainImage" class="form-label">Main Image</label>
                            <input type="file" class="form-control" id="mainImage" accept="image/*" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="additionalImages" class="form-label">Additional Images (Max 5)</label>
                            <input type="file" class="form-control" id="additionalImages" accept="image/*" multiple>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>