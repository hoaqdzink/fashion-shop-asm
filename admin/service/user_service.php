<?php 
    function insert(){
        try{
            if(isset($_POST['adduser']) && $_POST['adduser']){
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birth = $_POST['date_of_birth'];
                $role = $_POST['role_id'];
                if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] ==0){
                    $avarta_url = uploadImageToS3($_FILES['avatar']);
                    if(!$avarta_url){
                        echo 'Lỗi tải avarta lên s3';
                        $avarta_url = null;
                    }
                }
                insert_user($email, $password, $fullname, $birth, $avarta_url, $role);
                header('location: index.php?act=list_account');
            }
        }catch(Exception $e){
            echo '<h4 style="color: red;">Không thêm được tài khoản<br></h4>';
        }
        
    }

    function deleteUser(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            delete_user($id);
        }
        header('location: index.php?act=list_account');
        exit();
    }

    function get_account_by_id(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $roles = getAllRole();
            $user = get_user_by_id($id);
            include "view/form/user/updateUser.php";
        }
    }

    function updateUser() {
        try {
            if (isset($_POST['account_update']) && $_POST['account_update']) {
                $id = $_POST['user_id']; // ID của người dùng cần cập nhật
                $fullname = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birth = $_POST['date_of_birth'];
                $role = $_POST['role_id'];

                // Kiểm tra và xử lý avatar (nếu có tải lên)
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                    $avatar_url = uploadImageToS3($_FILES['avatar']);
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
                header('location: index.php?act=edituser&id='.$id);
                exit();
            }
        } catch (Exception $e) {
            echo '<h4 style="color: red;">Không cập nhật được tài khoản<br></h4>';
        }
    }
?>