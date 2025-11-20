<?php
$xmlFile = "about_us.xml";

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
        }
        .about-us {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .member {
            background: #fff;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .member:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .member h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
            color: #007BFF;
        }
        .member p {
            margin: 10px 0;
            color: #555;
        }
        .role {
            display: inline-block;
            padding: 5px 10px;
            background: #007BFF;
            color: #fff;
            border-radius: 5px;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h2>ABOUT US</h2>
    <div class="about-us">
        <?php
        foreach ($xml->member as $member) {
            $name = $member->name;
            $role = $member->role;
            $bio = $member->bio;
        ?>
        <div class="member">
            <h3><?php echo $name; ?></h3>
            <span class="role"><?php echo $role; ?></span>
            <p><?php echo $bio; ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
} else {
    echo "XML file not found.";
}
?>
