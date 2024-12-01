<?php 
    function insert(){
        try{
            if(isset($_POST['register']) && $_POST['register']){
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birth = $_POST['date_of_birth'];
                $role = 30002;
                $avarta_url=null;
                insert_user($email, $password, $fullname, $birth, $avarta_url, $role);
                echo "<script>
                    alert('Đăng ký thành công!');
                    window.location.href = 'index.php?act=login';
                </script>";
            }
        }catch(Exception $e){
            echo '<h4 style="color: red;">Không thể tạo tài khoản<br></h4>';
        }
        
    }

    function login() {
        if (isset($_POST['signin']) && $_POST['signin']) {
            $user = trim($_POST['email']); 
            $pass = trim($_POST['pass']); 
    
            // Gọi hàm kiểm tra đăng nhập
            $kq = checkLogin($user, $pass);
    
            // Kiểm tra kết quả
            if ($kq) { // Nếu có kết quả trả về
                $role = $kq['role_id']; 
                $_SESSION['role'] = $role;
                $_SESSION['idUser'] = $kq['user_id'];
                $_SESSION['fullname'] = $kq['full_name'];
    
                // Điều hướng dựa trên vai trò
                if ($role == 1) {
                    header('Location: admin/index.php');
                } else {
                    header('Location: index.php');
                }
            } else { // Nếu không tìm thấy người dùng
                echo "<script>
                        alert('Sai thông tin đăng nhập!');
                        window.location.href = 'index.php?act=login';
                    </script>";
            }
        }
    }
    
?>