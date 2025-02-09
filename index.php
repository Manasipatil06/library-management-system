<?php
session_start();



include "setting.php";
if (isset($_SESSION["sid"])) {
    header("location:home.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sid = mysqli_real_escape_string($set, $_POST["sid"]);
    $pass = mysqli_real_escape_string($set, $_POST["pass"]);

    if ($sid && $pass) {
        $p = sha1($pass);
        $sql = mysqli_query($set, "SELECT * FROM students WHERE sid='$sid' AND password='$p'");
        if (mysqli_num_rows($sql) == 1) {
            $_SESSION["sid"] = $_POST["sid"];
            header("location:home.php");
            exit;
        } else {
            $msg = "Incorrect Details";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="banner">
        <div class="title-content">
        <span class="head">Library Management System</span> 
        </div>

        <div class="admin-login">
             <a href="admin.php" class="link">Admin Sign In</a>
        </div>
    </div>
     
    <div align="center" class="align">
        <div id="wrapper">
            <span class="SubHead">Student Sign In</span>
            <form method="post" action="">
                <table border="0" cellpadding="4" cellspacing="4" class="table">
                    <tr>
                        <td colspan="2" align="center" class="msg"><?php echo isset($msg) ? $msg : ''; ?></td>
                    </tr>
                    <tr>
                        <td class="labels">Student ID : </td>
                        <td><input type="text" name="sid" class="fields" size="25" placeholder="Enter Student ID" required /></td>
                    </tr>
                    <tr>
                        <td class="labels">Password : </td>
                        <td><input type="password" name="pass" class="fields" size="25" placeholder="Enter Password" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Sign In" class="fields" /></td>
                    </tr>
                </table>
            </form>
            <span class="register-link">Don't have an account? &nbsp;<a href="register.php" class="link">Sign Up</a></span>
            
        </div>
    </div>
</body>
</html>
