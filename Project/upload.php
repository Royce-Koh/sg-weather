<?php
if (isset($_POST['uploadBtn']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // Directory where the file will be uploaded
    $uploadDir = 'img/';

    // Get file details
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];

    // Define the destination path
    $destPath = $uploadDir . $fileName;

    // Move the file to the img directory
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        echo "File uploaded successfully to: " . $destPath;
    } else {
        echo "There was an error uploading the file.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}
