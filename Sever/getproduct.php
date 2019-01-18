<?php
	include "connect.php";
	$page =$_GET['page'];
	$producttypeid=$_POST['productid'];
	$space=5;
	$limit=($page-1)*$space;
	$productarr=array();
	$query="SELECT * FROM product where ProductID = $producttypeid LIMIT $limit,$space";
	$data = mysqli_query($conn,$query);
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($productarr, new Product(
			$row['ID'],
			$row['ProductName'],
			$row['Price'],
			$row['Image'],
			$row['ProductDetail'],
			$row['ProductID']));
	}
	echo json_encode($productarr);
	class Product{
		function product($id,$productname,$price,$image,$productdetail,$productid){
			$this->id=$id;
			$this->productname=$productname;
			$this->price=$price;
			$this->image=$image;
			$this->productdetail=$productdetail;
			$this->productid=$productid;
		}
	}
?>