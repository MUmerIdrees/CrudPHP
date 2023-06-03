<?php
include("auth.php");
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$rollnum = $_REQUEST['roll_num']
$firstname =$_REQUEST['first_name'];
$last_name =$_REQUEST['last_name'];
$gender = $_REQUEST['gender'];
$update="update student set roll_num='".$rollnum."',
first_name='".$firstname."', last_name='".$last_name."',
gender='".$gender."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="rollnum" placeholder="Enter rollnum" 
required value="<?php echo $row['roll_num'];?>" /></p>
<p><input type="text" name="firstname" placeholder="Enter First_Name" 
required value="<?php echo $row['first_name'];?>" /></p>
<p><input type="text" name="lastname" placeholder="Enter Last_Name" 
required value="<?php echo $row['last_name'];?>" /></p>
<p><input type="text" name="gender" placeholder="Enter Gender" 
required value="<?php echo $row['gender'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>