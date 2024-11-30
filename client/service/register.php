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
?>