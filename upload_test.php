<?php
if(isset($_FILES["image"])) {
    $image = $_FILES["image"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        echo "File uploaded successfully to " . $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
        echo "Error Code: " . $image["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Upload</title>
</head>
<body>
    <form action="upload_test.php" method="post" enctype="multipart/form-data">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
