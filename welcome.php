<?php
session_start();

date_default_timezone_set('Asia/Kolkata');

// Set custom cookie for last visit
setcookie("last_visit", date("Y-m-d H:i:s"), time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
}
if (!isset($_SESSION['last_login_date'])) {
    $_SESSION['last_login_date'] = date("Y-m-d");
}
if (!isset($_SESSION['last_login_time'])) {
    $_SESSION['last_login_time'] = date("H:i:s");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/WT/welcome.php">Welcome, <?php echo $_SESSION['username'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/WT/add.php">Add Property</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8080/Assignment/m2.jsp">Search Property</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WT/mod1.html">Contact us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WT/about.php">About us </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="logout.php" method="post">
            <span class="mr-2">PROPERTY ID: <?php echo $_SESSION['sno']; ?></span>
            <span class="mr-2">Last Login Date: <?php echo $_SESSION['last_login_date']; ?></span>
            <span class="mr-2">Last Login Time: <?php echo $_SESSION['last_login_time']; ?></span>
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
    <?php
    if(isset($_COOKIE['last_visit'])) {
        echo "<p>Your last visit was on: " . $_COOKIE['last_visit'] . "</p>";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
// Function to fetch About Us information from XML file
function fetchAboutUs() {
    $.ajax({
        type: "GET",
        url: "aboutUs.xml", // Specify the URL of your XML file
        dataType: "xml",
        success: function(xml) {
            var aboutUsContent = "<h2>About Us</h2>"; // Initial content
            $(xml).find("member").each(function() {
                var name = $(this).find("name").text();
                var role = $(this).find("role").text();
                var bio = $(this).find("bio").text();
                aboutUsContent += "<h3>" + name + " - " + role + "</h3>";
                aboutUsContent += "<p>" + bio + "</p>";
            });
            $("#aboutUsContent").html(aboutUsContent); // Display the About Us content
        },
        error: function(xhr, status, error) {
            console.error("Error fetching About Us information:", error);
        }
    });
}

// Call the fetchAboutUs function when the About Us link is clicked
$(document).ready(function() {
    $("#aboutUsLink").click(function(e) {
        e.preventDefault(); // Prevent the default action of the link
        fetchAboutUs(); // Fetch About Us information
    });
});
</script>
</body>
</html>
