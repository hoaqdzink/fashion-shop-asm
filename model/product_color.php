<?php
    function insertProduct_colors($product_id, $color_id){
        $conn = connect();
        $sql = "INSERT INTO product_colors (product_id, color_id) VALUES ($product_id, $color_id)";
        $conn->exec($sql);
    }
?>