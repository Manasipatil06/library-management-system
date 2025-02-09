<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);

$name=$b['name'];
$issue_date=date('d/m/Y');
$date = DateTime::createFromFormat('d/m/Y',$issue_date);
$return_period = 10;
$date->modify("+$return_period days");
$return_date=$date->format('d/m/Y');


function calculate_fine($return_date) {
	$current_date = new DateTime();
	$return_date = DateTime::createFromFormat('d/m/Y', $return_date);
	$interval = $return_date->diff($current_date);
	$late_days = $interval->days;
	
	if ($interval->invert == 0) { // Check if the return date is in the past
		$fine = $late_days * 5; // Rs. 5 fine per day
	} else {
		$fine = 0; // No fine if the return date is in the future
	}
	return $fine;
}

// Example usage of the fine calculation function
// You can replace '01/01/2024' with the actual return date from your database
$fine_amt = calculate_fine($return_date);

$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,issue_date,return_date,fine_amt) VALUES('$sid','$bk','$ba','$issue_date', '$return_date','$fine_amt')");
	if($sql)
	{
		$msg="Successfully Issued";
	}
	else
	{
		$msg="Error Please Try Later";
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
 
 

<span class="SubHead">Issue Book</span>
 
 
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Book : </td><td><select name="name" class="fields" required >
<option value="" disabled="disabled" selected="selected"> - - Select Book - - </option>
<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_array($x))
{
	?>
<option value="<?php echo $y['id'];?>"><?php echo $y['name']." ".$y['author'];?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="GET" class="fields" /></td></tr>
</table>
</form>
 
 
<a href="home.php" class="link">Go Back</a>
 
 

</div>
</div>
</body>
</html>