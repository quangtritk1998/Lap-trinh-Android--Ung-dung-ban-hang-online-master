<?php
	include "connect.php";
	$customername=$_POST['customername'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];
	if(strlen($customername)>0&&strlen($email)>0&&strlen($phonenumber)>0)
	{
		$query = "INSERT INTO Bill(ID,CustomerName,PhoneNumber,Email) VALUES (NULL,'$customername','$phonenumber','$email')";
		if(mysqli_query($conn,$query)){
			$billid  = $conn->insert_id;
			echo $billid;
		}else
		echo 'failed';
	}
	else {
		echo "Ban hay kiem tra lai cac du lieu";
	}
?>