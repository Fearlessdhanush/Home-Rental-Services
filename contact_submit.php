<?php
// Assuming you have already established a database connection
require 'partials/_dbconnect.php';

// Get form data from request body
$data = json_decode(file_get_contents("php://input"), true);

$response = array();

// Iterate through each form data object in the array
foreach ($data as $entry) {
    // Extract form fields
    $name = $entry['name'];
    $email = $entry['email'];
    $query = $entry['query'];

    // Insert data into database
    $sql = "INSERT INTO contact_us (name, email, query) VALUES ('$name', '$email', '$query')";
    if (mysqli_query($conn, $sql)) {
        $response[] = array("success" => true, "message" => "Your query has been submitted successfully. We will get back to you soon!");
    } else {
        $response[] = array("success" => false, "message" => "Error: " . mysqli_error($conn));
    }
}

// Return response as JSON
echo json_encode($response);

// Close database connection
mysqli_close($conn);
?>
