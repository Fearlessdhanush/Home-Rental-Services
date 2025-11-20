<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$cgpa = $_POST['cgpa'];
$company = $_POST['company'];

$sql = "INSERT INTO students (name, email, phone, department, cgpa, company) VALUES ('$name', '$email', '$phone', '$department', '$cgpa', '$company')";

if ($conn->query($sql) === TRUE) {
    echo "Student added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

