<?php
	include "connect.php";
	$newproductarr = array();
	$query = "SELECT * FROM product ORDER BY ID DESC LIMIT 6";
	$data = mysqli_query($conn,$query);
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($newproductarr, new NewProduct(
			$row['ID'],
			$row['ProductName'],
			$row['Price'],
			$row['Image'],
			$row['ProductDetail'],
			$row['ProductID']
		));
	}
	echo json_encode($newproductarr);

	class NewProduct{
		function newproduct($id,$productname,$price,$image,$productdetail,$productid){
				$this->id=$id;
				$this->productname=$productname;
				$this->price=$price;
				$this->image=$image;
				$this->productdetail=$productdetail;
				$this->productid=$productid;
			}
	}
?>