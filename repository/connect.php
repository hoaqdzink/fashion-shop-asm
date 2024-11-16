<?php
function connect(){
    $servername = "gateway01.ap-southeast-1.prod.aws.tidbcloud.com;4000";
    $username = "3FQ9chxaHz1CgaL.root";
    $password = "hqb3CMdelG9UB6Ji";
    $dbname = "fashion_shop_db";
    $ssl_ca = "../isrgrootx1 (3).pem";

    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $options = [
            PDO::MYSQL_ATTR_SSL_CA => $ssl_ca,
            PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION 
        ];

        // Tạo kết nối PDO
        $conn = new PDO($dsn, $username, $password, $options);
        
        echo "Connected successfully";  // Kết nối thành công
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    //return $conn;
}
?>