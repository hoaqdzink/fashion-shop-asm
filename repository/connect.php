<?php
function connect(){
    $servername = "gateway01.ap-southeast-1.prod.aws.tidbcloud.com:4000";
    $username = "3FQ9chxaHz1CgaL.root";
    $password = "hqb3CMdelG9UB6Ji";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=fashion_shop_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}
?>