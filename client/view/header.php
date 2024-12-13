<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionBK Shop</title>
    <link rel="stylesheet" href="./css/client/reset.css">
    <link rel="stylesheet" href="./css/client/home_page.css">
    <link rel="stylesheet" href="./css/client/product.css">
    <link rel="stylesheet" href="./css/client/product_detail.css">
    <link rel="stylesheet" href="./css/client/sign-up.css">
    <link rel="stylesheet" href="./css/client/login.css">
    <link rel="stylesheet" href="./css/client/cart_view.css">
    <link rel="stylesheet" href="./css/client/bill_details.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div class="header">
                <div class="col-md-2">
                    <div class="logo">
                        <p><b>FashionBK</b></p>
                    </div>
                </div>

                <button class="nav-toggle" aria-label="toggle navigation">
                    <span class="hamburger"></span>
                </button>

                <div class="col-md-1">
                </div>

                <div class="col-md-9 nav-menu">
                    <div class="menu">
                        <ul class="menu-list" id="my-menu-list">
                            <li class="menu-list-item"><a href="index.php?act=home">Trang chủ</a></li>
                            <li class="menu-list-item"><a href="index.php?act=product">Sản phẩm</a></li>
                            <li class="menu-list-item"><a href="index.php?act=cart-view">Giỏ hàng</a></li>
                            <?php 
                                if(isset($_SESSION['idUser'])&&($_SESSION['idUser']!="")){
                                    $avatar = isset($_SESSION['avatar']) && !empty($_SESSION['avatar']) 
                                        ? htmlspecialchars($_SESSION['avatar'], ENT_QUOTES, 'UTF-8') . '?' . time() 
                                        : './img/image.png';
                                    echo '
                                        <li class="menu-list-item"><a href="index.php?act=bill-view">Lịch sử mua hàng</a></li>
                                        <li class="menu-list-item dropdown">
                                            <img src="' . $avatar . '" alt="Avatar" class="avatar" id="userDropdown">
                                            <div class="dropdown-menu">
                                                <a href="index.php?act=profile">Thông tin cá nhân</a>
                                                <a href="index.php?act=change-password">Đổi mật khẩu</a>
                                                <a href="index.php?act=logout">Đăng xuất</a>
                                            </div>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li class="menu-list-item"><a href="index.php?act=login" id="signIn">Đăng nhập</a></li>
                                        <li class="menu-list-item"><a href="index.php?act=sign-up"><button id="signUp">Đăng ký</button></a></li>
                                    ';
                                }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
