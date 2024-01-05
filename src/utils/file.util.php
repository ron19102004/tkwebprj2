<?php
class FileHandler
{
    public static function deleteFile($filePath)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/src/' . $filePath;
        if (file_exists($path)) {
            unlink($path);
            return [
                "status" => true,
                "message" => 'Deleted',
                "data" => null
            ];
        } else {
            return [
                "status" => false,
                "message" => 'Not found',
                "data" => null
            ];
        }
    }
    public static function upload($file,$upload_on = 'views/assets/')
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return [
                "status" => false,
                "message" => 'Upload failed with error code ' . $file['error'],
                "data" => null
            ];
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadedFileName = $file['name'];
        $extension = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            return [
                "status" => false,
                "message" => 'Invalid file extension. Allowed extensions: ' . implode(', ', $allowedExtensions),
                "data" => null
            ];
        }
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/src/".$upload_on;
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $destination = time() . '_' . $uploadedFileName;
        $pathUpload = $upload_on . $destination;
        $destination = $uploadDir . $destination;
        if (file_exists($destination)) {
            echo 'File already exists.';
            return;
        }
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                "status" => true,
                "message" => 'Uploaded',
                "data" => $pathUpload
            ];
        } else {
            return [
                "status" => false,
                "message" => 'Error uploading file.',
                "data" => null
            ];
        }
    }
}
