<?php
include("setting.php");
session_start();

// Redirect to welcome.php every time before displaying the main page
//if (!isset($_SESSION["welcome_redirected"])) {
 //   $_SESSION["welcome_redirected"] = true;
 //   header("Location: welcome.php");
 //   exit;
//}


if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="banner">
        <div class="title-content">
        <span class="head">Library Management System</span> 
        <marquee class="clg" direction="right" behavior="alternate" scrollamount="1">Welcome to Our Library</marquee>
        </div>
    </div>
 

<div align="center">
<div id="wrapper">
 
 

<span class="SubHead">Welcome <?php echo $name;?></span>
 
 
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td><a href="issueBook.php" class="Command">Get Book</a></td><td><a href="request.php" class="Command">Request New Books</a></td></tr>
<tr><td><a href="changePassword.php" class="Command">Change Password</a></td><td><a href="logout.php" class="Command">Logout</a></td></tr>
</table>
 
 

 
 

</div>
</div>
</body>
</html>