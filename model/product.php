<?php
    function insertProduct($name, $price, $original_price, 
                            $discount_percentage, $main_image, $description, 
                            $color_id, $category_id, $user_id){
            $conn = connect(); // Giả sử hàm connect() trả về đối tượng kết nối PDO
            $sql = "INSERT INTO products (name, price, original_price, discount_percentage, main_image, description, category_id, user_id, color_id)
                    VALUES (:name, :price, :original_price, :discount_percentage, :main_image, :description, :category_id, :user_id, :color_id)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':price' => $price,
                ':original_price' => $original_price,
                ':discount_percentage' => $discount_percentage,
                ':main_image' => $main_image,
                ':description' => $description,
                ':category_id' => $category_id,
                ':user_id' => $user_id,
                ':color_id' => $color_id,
            ]);
            $product_id = $conn->lastInsertId();

            return $product_id;
    }

    function getAllProducts(){
        $conn = connect();
        $stmt = $conn->prepare("SELECT 
                p.product_id ProductID,
                p.name ProductName,
                p.price Price,
                p.original_price OriginalPrice,
                p.discount_percentage Discount,
                p.main_image Image,
                c.name Category,
                cl.hex_code Color,
                u.full_name Creator
            FROM 
                products p
            LEFT JOIN categories c ON p.category_id = c.category_id
            LEFT JOIN colors cl ON p.color_id = cl.color_id
            INNER JOIN users u ON p.user_id = u.user_id;

            ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function getByProductId($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    function deleteProductById($id){
        $conn = connect();
        $sql = "DELETE FROM products WHERE product_id = ".$id;
        $conn->exec($sql);
    }

    function updateProductById($id, $name, $price, $original_price, $discount_percentage, $main_image, $description, $category_id, $color_id) {
        $conn = connect();
        
        $sql = "UPDATE products 
                SET 
                    name = :name, 
                    price = :price, 
                    original_price = :original_price, 
                    discount_percentage = :discount_percentage, 
                    main_image = :main_image, 
                    description = :description, 
                    category_id = :category_id, 
                    color_id = :color_id
                WHERE product_id = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':original_price' => $original_price,
            ':discount_percentage' => $discount_percentage,
            ':main_image' => $main_image,
            ':description' => $description,
            ':category_id' => $category_id,
            ':color_id' => $color_id,
            ':id' => $id,
        ]);

        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :id");
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product; 
    }
?>