<?php
    require __DIR__ . '/../vendor/autoload.php'; 

    use Aws\S3\S3Client;

    // Thông tin kết nối S3
    $region = 'ap-southeast-2';
    $version = 'latest';
    $access_key_id = 'AKIAYQNJS6M56LXY5MM2'; 
    $secret_access_key = '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'; 
    $bucket = 'phpasm';

    $statusMsg = '';
    $status = 'danger';

    // Tạo đối tượng S3 Client
    $s3Client = new S3Client([
        'region' => $region,
        'version' => $version,
        'credentials' => [
            'key'    => $access_key_id,
            'secret' => $secret_access_key,
        ]
    ]);
    try {
        $result = $s3Client->listObjects([
            'Bucket' => $bucket
        ]);
        $statusMsg = 'List Objects successful: ' . json_encode($result);
        $status = 'success';
    } catch (Aws\Exception\AwsException $e) {
        $statusMsg = 'Error: ' . $e->getMessage();
        $status = 'danger';
    }

    function uploadImageToS3($image) {
        global $s3Client, $bucket;
        
        // Lấy tên file từ $_FILES và tạo đường dẫn
        $targetFile = basename($image["name"]);
        // Đường dẫn trong S3
        $filePath = "uploads/" . $targetFile; 
    
        try {
            // Upload ảnh lên S3
            $result = $s3Client->putObject([
                'Bucket' => $bucket,
                'Key'    => $filePath, // Key xác định vị trí file trong bucket
                'SourceFile' => $image['tmp_name'], // File tạm trên server
                'ACL'    => 'public-read', // Đảm bảo ảnh có thể truy cập công khai
            ]);
    
            // Trả về URL của ảnh trên S3
            return $result['ObjectURL'];
    
        } catch (Aws\Exception\AwsException $e) {
            echo "Lỗi upload ảnh: " . $e->getMessage();
            return null;
        }
    }
?>
