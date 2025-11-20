<!-- Add this JavaScript code in the <head> section of your HTML -->
<script>
    function confirmDelete(propertyId, description) {
    if (confirm("Are you sure you want to delete this property:\n\n" + description)) {
        document.getElementById("deleteForm_" + propertyId).submit();
    }
}

</script>

<?php
session_start(); // Start the session

require 'partials/_dbconnect.php'; // Adjust the path based on your directory structure

// Check if the user is logged in and has a session sno
if(isset($_SESSION["sno"])) {
    $sno = $_SESSION["sno"];
} else {
    // Redirect to login page or handle the case where user is not logged in
    // For example:
    // header("Location: login.php");
    // exit;
}

// Select properties that belong to the current user's session sno
$result = mysqli_query($conn, "SELECT * FROM propertyinfo WHERE id = '$sno'"); // Change 'propertyinfo' to your actual table name and 'user_id' to the appropriate column name

$i = 1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Index</title>
</head>
<body>
<h2>Index</h2>
<table border="1">
<tr>
<td>#</td>
<td>ID</td>
<td>Bedrooms</td>
<td>Location</td>
<td>Price</td>
<td>Availability</td>
<td>Description</td>
<td>Action</td>
</tr>
<?php 
// Fetch and display property data
while($row = mysqli_fetch_assoc($result)): ?>
<tr id="<?php echo $row["id"]; ?>">
<td><?php echo $i++; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["bedrooms"]; ?></td>
<td><?php echo $row["location"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["availability"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<!-- Inside the <td>Action</td> cell of the table -->
<!-- Inside the <td>Action</td> cell of the table -->
<td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    <button type="button" onclick="confirmDelete(<?php echo $row['id']; ?>, '<?php echo $row['description']; ?>');">Delete</button>
    <form id="deleteForm_<?php echo $row['id']; ?>" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
    </form>
</td>


</tr>
<?php endwhile; ?>
</table>
<a href="add.php">Add</a>
<?php require 'script.php'; ?> <!-- Ensure that you have script.php file in the correct path -->
</body>
</html>
