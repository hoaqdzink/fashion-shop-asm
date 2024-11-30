<body class="body-product-list">
    <h1>Danh sách tài khoản</h1>
    <table class="table-product-list">
        <thead>
            <tr class="tr-product-list">
                <th class="th-product-list">ID</th>
                <th class="th-product-list">Họ Tên</th>
                <th class="th-product-list">Ngày Sinh</th>
                <th class="th-product-list">Email</th></th>
                <th class="th-product-list">Avatar</th>
                <th class="th-product-list">Vai trò</th>
                <th class="th-product-list"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                //var_dump($users);
                if(isset($users) && count($users) >0){
                    foreach($users as $item){
                        echo '
                            <tr class="tr-product-list">
                            <td class="td-product-list">'.$item['user_id'].'</td>
                            <td class="td-product-list price-product-list">'.$item['full_name'].'</td>
                            <td class="td-product-list stock-product-list">'.$item['date_of_birth'].'</td>
                            <td class="td-product-list discount-product-list">'.$item['email'].'</td>
                            <td class="td-product-list">
                                <img src="'.$item["avatar"].'" style="width:100px; height:150px;" alt="Avatar Image">
                            </td>
                            <td class="td-product-list">'.$item['role_name'].'</td>
                            <td class="td-product-list actions-product-list">
                                <a href="index.php?act=edituser&id='.$item['user_id'].'" class="button-product-list">Edit</a>
                                <a href="index.php?act=deleteuser&id='.$item['user_id'].'" class="button-product-list">Delete</a>
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