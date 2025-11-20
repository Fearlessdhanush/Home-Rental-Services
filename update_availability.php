<?php
session_start();

require 'partials/_dbconnect.php';

// Check if the user is logged in and has a session sno
if(isset($_SESSION["sno"])) {
    $sno = $_SESSION["sno"];
} else {
    // Handle the case where the user is not logged in
    // For example:
    // header("Location: login.php");
    // exit;
}

// Check if the property ID, availability, and description are provided in the POST request
if(isset($_POST['id']) && isset($_POST['availability']) && isset($_POST['description'])) {
    $propertyId = $_POST['id'];
    $availability = $_POST['availability'];
    $description = $_POST['description'];
    
    // Update the availability of the property in the database
    $sql = "UPDATE propertyinfo SET availability = '$availability' WHERE id = '$propertyId' AND description = '$description' ";
    
    if (mysqli_query($conn, $sql)) {
        echo "Availability updated successfully";
    } else {
        echo "Error updating availability: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the required parameters are not provided
    // For example:
    // echo "Error: Required parameters are missing";
}
?>
