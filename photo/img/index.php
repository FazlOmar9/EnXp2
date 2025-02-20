<?php
$uploadMessage = '';
$uploadedImagePath = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (strpos($target_file, '.png') !== false) {
        if ($_FILES["image"]["type"] == "image/png") {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                sleep(1);
                if (checkExecutableCode($target_file) && checkAdditionalConditions($target_file)) {
                    $uploadMessage = "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded and i will be considered for the evaluation.";
                    $uploadedImagePath = $target_file;
                } else {
                    unlink($target_file);
                    $uploadMessage = "Sorry, the file failed security checks.";
                }
            } else {
                $uploadMessage = "Sorry, there was an error uploading your file.";
            }
        } else {
            $uploadMessage = "Sorry, the file type is not a PNG image.";
        }
    } else {
        $uploadMessage = "Sorry, only files with .png in the name are allowed.";
    }
}

function checkExecutableCode($fileName) {
    $fileContent = file_get_contents($fileName);
    
    $suspiciousPatterns = [
        '/<\?php/i',
        '/<\?=/i',
        '/<script/i',
        '/<\s*html/i',
        '/<\s*body/i',
        '/\bsystem\s*\(/i',
        '/\bexec\s*\(/i',
        '/\bshell_exec\s*\(/i',
        '/\bUNION\s+SELECT\b/i',
        '/\beval\s*\(/i',
        '/\bbase64_decode\s*\(/i',
    ];

    foreach ($suspiciousPatterns as $pattern) {
        if (preg_match($pattern, $fileContent)) {
            return false; 
        }
    }
    
    return true; 
}

function checkAdditionalConditions($fileName) {
    return true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <h1>Image Upload</h1>

    <?php if (!empty($uploadMessage)): ?>
        <p><?php echo $uploadMessage; ?></p>
    <?php endif; ?>

    <?php if (!empty($uploadedImagePath)): ?>
        <h2>Uploaded Image:</h2>
        <img src="<?php echo htmlspecialchars($uploadedImagePath); ?>" alt="Uploaded Image">
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept=".png">
        <input type="submit" value="Upload Image">
    </form>
</body>
</html>