<body class="body-product-list">
    <h1>Admin Product Management</h1>
    <table class="table-product-list">
        <thead>
            <tr class="tr-product-list">
                <th class="th-product-list">ID</th>
                <th class="th-product-list">Tên SP</th>
                <th class="th-product-list">Giá</th>
                <th class="th-product-list">Giá gốc</th>
                <th class="th-product-list">Giảm giá</th>
                <th class="th-product-list">Ảnh</th>
                <th class="th-product-list">Danh mục</th>
                <th class="th-product-list">Màu sắc</th>
                <th class="th-product-list">Người tạo</th>
                <th class="th-product-list"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                //var_dump($productList);
                if(isset($productList) && count($productList) >0){
                    foreach($productList as $item) {
                        echo '
                        
                            <tr class="tr-product-list">
                                <td class="td-product-list">'.$item['ProductID'].'</td>
                                <td class="td-product-list price-product-list">'.$item['ProductName'].'</td>
                                <td class="td-product-list original-price-product-list">'.$item['Price'].' VNĐ</td>
                                <td class="td-product-list discount-product-list">'.$item['OriginalPrice'].'</td>
                                <td class="td-product-list stock-product-list">'.$item['Discount'].' %</td>
                                <td class="td-product-list">
                                    <img src="'.$item["Image"].'" style="width:100px; height:150px;" alt="Product Image">
                                </td>
                                <td class="td-product-list">'.$item['Category'].'</td>
                                <td class="td-product-list">
                                    <div style="width: 30px; height: 30px; background-color: '.$item['Color'].'; border-radius: 50%;"></div>
                                </td>
                                <td class="td-product-list">'.$item['Creator'].'</td>
                                <td class="td-product-list actions-product-list">
                                    <a href="index.php?act=editProduct&id='.$item['ProductID'].'" class="button-product-list">Edit</a>
                                    <a href="index.php?act=deleteProduct&id='.$item['ProductID'].'" class="button-product-list">Delete</a>
                                </td>
                             </tr>   

                        ';
                    }
                }
            ?>
        </tbody>
    </table>
    <div id="pagination" class="pagination-container"></div>
</body>