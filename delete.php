<?php
session_start(); // Start the session

require 'partials/_dbconnect.php'; // Adjust the path based on your directory structure

// Check if the user is logged in and has a session sno
if(isset($_SESSION["sno"])) {
    $sno = $_SESSION["sno"];
} else {
   
}

// Check if the property ID and description are provided in the request
if(isset($_POST['id']) && isset($_POST['description'])) {
    $propertyId = $_POST['id'];
    $description = $_POST['description'];
    
    // Delete the property from the database
    $sql = "DELETE FROM propertyinfo WHERE id = '$propertyId' AND description = '$description'"; // Change 'propertyinfo' as per your table structure
    if (mysqli_query($conn, $sql)) {
        echo "Property deleted successfully";
    } else {
        echo "Error deleting property: " . mysqli_error($conn);
    }
} else {
 
}
?>
