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
?>