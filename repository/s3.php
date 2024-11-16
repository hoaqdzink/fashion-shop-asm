<?php
    require __DIR__ . '/vendor/autoload.php'; 

    use Aws\S3\S3Client;

    // Thông tin kết nối S3
    $region = 'ap-southeast-2';
    $version = 'latest';
    $access_key_id = 'AKIAYQNJS6M56LXY5MM2'; 
    $secret_access_key = '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'; 
    $bucket = 'vinhdemo';

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

    echo "Status: " . $status . "<br>";
    echo "Message: " . $statusMsg;
?>
