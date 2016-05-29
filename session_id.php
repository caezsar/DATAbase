<?php
session_start();
$sql = ("SELECT user_name, user_id, admin FROM users WHERE user_id=".$_SESSION['user']);
$result = $conn->query($sql);
$count = mysqli_num_rows($result);	
$row=mysqli_fetch_array($result);
$sessionid = $row['user_id'];	
$sessionname = $row['user_name'];
$isdadmin = $row['admin'];

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
?>
