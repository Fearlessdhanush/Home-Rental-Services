<?php
require 'partials/_dbconnect.php';

session_start();

if(isset($_POST["bedrooms"]) && isset($_POST["location"]) && isset($_POST["price"]) && isset($_POST["availability"]) && isset($_POST["description"]) && isset($_FILES["image"])) {
    insert();
}

function insert() {
    global $conn;

    // Check if user is authenticated and retrieve their sno
    if(isset($_SESSION["sno"])) {
        $id = $_SESSION["sno"];
    } else {
        // User is not authenticated or sno is not available
        echo "Error: User is not authenticated or sno is not available";
        return;
    }

    $bedrooms = $_POST["bedrooms"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $availability = $_POST["availability"];
    $description = $_POST["description"];
    $image = $_FILES["image"];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        return;
    }

    // Check file size (e.g., limit to 5MB)
    if ($image["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        return;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return;
    }

    // Check if $target_file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        return;
    }

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        echo "File uploaded successfully to " . $target_file . "<br>";

        // Insert data into database
        $query = "INSERT INTO propertyinfo (sno, bedrooms, location, price, availability, description, photo ) VALUES ('$id', '$bedrooms', '$location', '$price', '$availability', '$description', '$target_file')";
        
        if(mysqli_query($conn, $query)) {
            echo "Inserted Successfully";
            // Clear input fields after successful insertion
            echo "<script>
                    document.getElementById('bedrooms').value = '';
                    document.getElementById('location').value = '';
                    document.getElementById('price').value = '';
                    document.getElementById('availability').value = '';
                    document.getElementById('description').value = '';
                    document.getElementById('image').value = '';
                  </script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
