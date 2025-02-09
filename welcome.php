<?php
session_start();
$_SESSION['welcome_displayed'] = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #banner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            border: none;
        }
        .head {
            font-size: 24px;
            font-weight: bold;
        }
        .clg {
            font-size: 18px;
            color: blue;
        }
        .nav-links {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div id="banner">
        <span class="head">Welcome to our Library</span>
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
    </div>
</body>
</html>
