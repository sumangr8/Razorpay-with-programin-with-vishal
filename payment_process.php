<?php
include("db.php");
if(isset($_POST["payment_id"]) && isset($_POST["amt"]) && isset($_POST["name"]))
{
	$payment_id=$_POST["payment_id"];
	$amount=$_POST["amt"];
	$name=$_POST["name"];
	$payment_status="Complete";
	$added_on=date('Y-m-d h:i:s');
	$qry=mysqli_query($con,"insert into razorpay(payment_id,name,amount,payment_status,added_on) values('$payment_id','$name','$amount','$payment_status','$added_on')");
}
?>
