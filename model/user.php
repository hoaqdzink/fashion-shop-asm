<?php
    function get_all_users(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT 
                                users.user_id,
                                users.email,
                                users.full_name,
                                users.date_of_birth,
                                users.avatar,
                                roles.role_name
                            FROM 
                                users
                            JOIN 
                                roles 
                            ON 
                                users.role_id = roles.role_id;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function get_user_by_id($user_id){
        $conn = connect();
        $stmt = $conn->prepare("SELECT 
                                    users.user_id,
                                    users.email,
                                    users.full_name,
                                    users.password,
                                    users.date_of_birth,
                                    users.avatar,
                                    roles.role_name,
                                    roles.role_id
                                FROM 
                                    users
                                JOIN 
                                    roles 
                                ON 
                                    users.role_id = roles.role_id
                                WHERE 
                                    users.user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function update_user($user_id, $email, $password, $full_name, $date_of_birth, $avatar, $role_id){
        $conn = connect();
        $stmt = $conn->prepare("UPDATE users 
                                SET email = :email, 
                                    password = :password, 
                                    full_name = :full_name, 
                                    date_of_birth = :date_of_birth, 
                                    avatar = :avatar, 
                                    role_id = :role_id
                                WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':role_id', $role_id);
        return $stmt->execute();
    }

    function insert_user($email, $password, $full_name, $date_of_birth, $avatar, $role_id){
        $conn = connect();
        $stmt = $conn->prepare("INSERT INTO users (email, password, full_name, date_of_birth, avatar, role_id) 
                                VALUES (:email, :password, :full_name, :date_of_birth, :avatar, :role_id)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':role_id', $role_id);
        return $stmt->execute();
    }

    function delete_user($user_id){
        $conn = connect();
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }

    function checkLogin($username, $password) {
        try {
            $conn = connect();
            $stmt = $conn->prepare("SELECT 
                                        u.user_id,
                                        u.full_name,
                                        u.email,
                                        u.avatar,
                                        r.role_name,
                                        r.role_id
                                    FROM 
                                        users u
                                    JOIN 
                                        roles r ON u.role_id = r.role_id
                                    WHERE 
                                        u.email = :username
                                        AND u.password = :password");
            // Binding parameters
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            
            // Execute the statement
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $result = $stmt->fetch();
            
            // Kiểm tra kết quả
            if ($result) {
                return $result; // Trả về toàn bộ thông tin
            } else {
                return null; // Không tìm thấy thông tin đăng nhập
            }
        } catch (PDOException $e) {
            // Xử lý lỗi
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    function checkPassword($userid) {
        $conn = connect();
    
        $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = :userid");
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result ? $result['password'] : null;
    }

    function update_password($userid, $password) {
        $conn = connect();
    
        $stmt = $conn->prepare("UPDATE users SET password = :password WHERE user_id = :userid");
    
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    
                                    
?>