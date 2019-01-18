<?php
	include "connect.php";
	$query = "SELECT * FROM devicetype";
	$data = mysqli_query($conn,$query);
	$devicetypearr = array();
	while($row = mysqli_fetch_assoc($data))
	{
		array_push($devicetypearr,new DeviceType(
			$row['ID'],
			$row['ProductName'],
			$row['Image']
		));
	}
	echo json_encode($devicetypearr);
	class DeviceType{
		function devicetype($id,$devicetypename,$image){
			$this->id=$id;
			$this->devicetypename=$devicetypename;
			$this->image=$image;
		}
	}
?>