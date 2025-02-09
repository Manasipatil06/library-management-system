<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Book Already Exists";
	}
}
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
 
 

<span class="SubHead">Books Issued by Students</span>
 
 

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" ><th>Book Name</th><th>Author</th><th>Issued By<br>Student ID</th><th>Issue Date</th><th>Return date</th><th>Fine Amount</th><th>Action</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td><td><?php echo $y['sid'];?></td>
<td><?php echo $y['issue_date'];?></td><td><?php echo $y['return_date'];?></td><td><?php echo $y['fine_amt'];?></td><td><a href="return.php?r=<?php echo $y['id'];?>" class="link">Return</a></td>
</tr>
<?php
}
?>
</table> 
 
<a href="adminhome.php" class="link">Go Back</a>
 
 

</div>
</div>
</body>
</html>