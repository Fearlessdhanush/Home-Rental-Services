<?php
session_start(); // Start the session

require 'partials/_dbconnect.php'; // Adjust the path based on your directory structure

// Check if the user is logged in and has a session sno
if(isset($_SESSION["sno"])) {
    $sno = $_SESSION["sno"];
} else {
    
}

// Check if an 'id' parameter is provided in the URL
if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
} else {
    
}

// Fetch the property details for the provided property ID
$result = mysqli_query($conn, "SELECT * FROM propertyinfo WHERE id = '$property_id' "); // Change 'propertyinfo' and 'user_id' as per your table structure

// Check if the property exists for the provided property ID and session sno
if(mysqli_num_rows($result) > 0) {
    // Fetch property details
    $property = mysqli_fetch_assoc($result);
} else {
    
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Edit Property</title>
</head>
<body>
<h2>Edit Property</h2>
<form action="update_availability.php" method="post"> <!-- Change 'update_availability.php' to the script handling the update of availability -->
    <input type="hidden" name="id" value="<?php echo $property['id']; ?>"> <!-- Hidden input to pass the property ID -->

    <div>
        <label for="availability">Availability:</label>
        <select id="availability" name="availability">
            <option value="Yes" <?php if($property['availability'] == 'Yes') echo 'selected'; ?>>Yes</option>
            <option value="No" <?php if($property['availability'] == 'No') echo 'selected'; ?>>No</option>
        </select>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $property['description']; ?></textarea>
    </div>

    <button type="submit">Update Availability</button>
</form>
</body>
</html>
