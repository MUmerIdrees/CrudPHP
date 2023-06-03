<?php
include("auth.php");
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $rollnum = $_REQUEST['roll_num'];
    $firstname =$_REQUEST['first_name'];
    $lastname = $_REQUEST['last_name'];
    $gender = $_REQUEST['gender'];
    $ins_query="insert into student
    (`roll_num`,`first_name`,`last_name`,`gender`)values
    ('$rollnum','$firstname','$lastname','$gender')";
    mysqli_query($con,$ins_query)
    or die(mysqli_error($con));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="rollnum" placeholder="Enter rollnum" required /></p>
<p><input type="text" name="name" placeholder="Enter First_Name" required /></p>
<p><input type="text" name="name" placeholder="Enter Last_Name" required /></p>
<p><input type="text" name="gender" placeholder="Enter Gender" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>