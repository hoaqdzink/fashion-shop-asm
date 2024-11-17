<?php 
session_start();
ob_start();
include "view/header.php" ?>    

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
                                include "view/updateProduct.php";
                                break;
                            case 'list_product':
                                include "view/listProduct.php";
                                break;
                            case 'update_category':
                                include "view/updateCategory.php";
                                break;
                            case 'list_category':
                                include "view/listCategory.php";
                                break;
                            case 'update_account':
                                include "view/updateAccount.php";
                                break;
                            case 'list_account':
                                include "view/listAccount.php";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin/script.js"></script>
    <script src="../js/admin/category.js"></script>
</body>

</html>
