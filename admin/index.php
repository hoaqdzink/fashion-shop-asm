<?php 
    session_start();
    ob_start();
    include "../repository/connect.php";
    include "../repository/s3.php";
    include "../model/category.php";
    include "../model/size.php";
    include "../model/color.php";
    include "../model/product.php";
    include "../model/role.php";
    include "../model/user.php";
    include "../model/images.php";
    include "../model/product_size.php";
    include "service/product_service.php";
    include "service/user_service.php";
    include "view/header.php";
?>    

<body>
    <div class="wrapper">
        <?php include "view/sidebar.php" ?>
        <div class="main">
            <main class="content px-3 py-2">
                <?php include "view/navbar.php" ?>
                <!-- nay co the thay doi theo dia chi -->
                <div class="container-fluid">
                <?php 
                    if (isset($_GET['act'])) {
                        switch ($_GET['act']) {
                            case 'statistical':
                                include "view/statistical.php";
                                break;
                            case 'update_product':
                                $category = getAllCategory();
                                $size = getAllSize();
                                $colors = getAllColors();
                                include "view/form/product/addProduct.php";
                                break;
                            case 'addProduct':
                                checkInsert();
                                break;
                            case 'editProduct':
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $category = getAllCategory();
                                    $size = getAllSize();
                                    $colors = getAllColors();
                                    $product = getByProductId($id);
                                    $size_product = getProductSizeByIdProduct($id);
                                    $images = getImagesbyProductId($id);
                                }
                                include "view/form/product/updateProduct.php";
                                break;
                            case 'product_update':
                                update_product_by_id();
                                include "view/form/product/updateProduct.php";
                                break;
                            case 'deleteProduct':
                                deleteProduct();
                                break;
                            case 'list_product':
                                $productList =getAllProducts();
                                include "view/listProduct.php";
                                break;
                            case 'list_category':
                                include "view/listCategory.php";
                                break;
                            case 'list_role':
                                include "view/listRole.php";
                                break;
                            case 'list_account':
                                $users = get_all_users();
                                include "view/listAccount.php";
                                break;
                            case 'update_account':
                                $roles = getAllRole();
                                include "view/form/user/addUser.php";
                                break;
                            case 'adduser':
                                insert();
                                include "view/listAccount.php";
                                break;
                            case 'edituser':
                                get_account_by_id();
                                break;
                            case 'account_update':
                                updateUser();
                                break;
                            case 'deleteuser':
                                deleteUser();
                                break;
                            case 'list_size':
                                include "view/listSize.php";
                                break;
                            default:
                                include "view/statistical.php";
                                break;
                        }
                    } else {
                        include "view/statistical.php";
                    }
                ?>
                </div>    
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <?php include "view/footer.php" ?>
        </div>
    </div>
    <?php
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
    ?>
    <script>
        const BASE_URL = "<?php echo rtrim($baseUrl, '/'); ?>";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin/script.js"></script>
    <script src="../js/admin/category.js"></script>
    <script src="../js/admin/role.js"></script>
    <script src="../js/admin/size.js"></script>
</body>

</html>
