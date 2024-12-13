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
                $_SESSION['avatar'] = $kq['avatar'];
    
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

    function updatePasswordBySessionUserid(){
        $id = $_SESSION['idUser'];
        if(isset($_POST['submit-change-password']) && $_POST['submit-change-password']){
            $currentPassword = trim($_POST['currentPassword']);
            $newPassword = trim($_POST['newPassword']);
            
            $checkPassword = checkPassword($id);
            if($currentPassword == $checkPassword){
                if(update_password($id, $newPassword)){
                    echo "<script>
                        alert('cập nhật thành công!');
                        window.location.href = 'index.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('cập nhật thất bại!');
                        window.location.href = 'index.php?act=change-password';
                    </script>";
                }
            }else{
                echo "<script>
                        alert('Mật khẩu hiện tại không đúng!');
                        window.location.href = 'index.php?act=change-password';
                    </script>";
            }
        }
    }
    
    function updateUser() {
        try {
            if (isset($_POST['account_update']) && $_POST['account_update']) {
                $id = $_SESSION['idUser'];
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birth = $_POST['date_of_birth'];
                $role = $_SESSION['role'];

                // Kiểm tra và xử lý avatar (nếu có tải lên)
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                    $avatar_url = uploadImageToS3($_FILES['avatar']);
                    $_SESSION['avatar'] = $avatar_url;
                    if (!$avatar_url) {
                        echo 'Lỗi tải avatar lên S3';
                        $avatar_url = null;
                    }
                } else {
                    $user = get_user_by_id($id);
                    if ($user) {
                        $avatar_url = $user['avatar']; // Giữ lại ảnh cũ
                    } else {
                        echo "Không tìm thấy sản phẩm để cập nhật.<br>";
                        return;
                    }
                }
    
                // Gọi hàm cập nhật người dùng trong database
                update_user($id, $email, $password, $fullname, $birth, $avatar_url, $role);
    
                // Điều hướng về danh sách tài khoản
                header('location: index.php?act=profile');
                exit();
            }
        } catch (Exception $e) {
            echo '<h4 style="color: red;">Không cập nhật được tài khoản<br></h4>';
        }
    }
?>