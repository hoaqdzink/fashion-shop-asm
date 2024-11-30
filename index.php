<?php 
    session_start();
    ob_start();
    include './repository/connect.php';
    include './model/size.php';
    include './model/color.php';
    include './model/category.php';
    include './model/product.php';
    include './model/product_size.php';
    include './model/images.php';
    include './client/service/register.php';
    include './model/user.php';

    include './client/view/header.php';
?>

<div class="main">
    <?php
        if(isset($_GET['act'])){
            switch ($_GET['act']){
                case 'home':
                    include './client/view/home.php';
                    break;
                case 'product':
                    $category = getAllCategory();
                    $sizes = getAllSize();
                    $colors = getAllColors();
                    $products = getAllProducts();
                    include './client/view/product.php';
                    break;
                case 'product-details':
                    if(isset($_GET['productId'])){
                        $id=$_GET['productId'];
                        $sizes = getAllSize();
                        $productId=getByProductId($id);
                        $colors = getAllColors();
                        $productSize = getProductSizeByIdProduct($id);
                        $subimage = getImagesbyProductId($id);
                    }
                    include './client/view/product_detail.php';
                    break;
                case 'sign-up':
                    include './client/view/sign_up.php';
                    break;
                case 'register':
                    insert();
                    break;
                case 'login':
                    include './client/view/login.php';
                    break;
                default:
                    include './client/view/home.php';
                    break;
            }
        }else{
            include './client/view/home.php';
        }
    ?>
</div>

<?php
    include './client/view/footer.php';
?>