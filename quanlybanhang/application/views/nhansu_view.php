<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facebook.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="shortcut icon" href="https://banner2.kisspng.com/20180418/yze/kisspng-information-technology-computer-icons-clip-art-skill-5ad7cb828a3753.1193036015240917785661.jpg" style="width:17px; height: 17px">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/jquery.fileupload.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>2.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>2.js">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<h3 class="display-3"> LIST PRODUCT</h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="card-deck-wrapper">
				<div class="card-deck">
				<?php  foreach ($mangketqua as $value): ?>
				<div class="col-sm-3">
				<div class="card">
					<img class="card-img-top img-fluid" src="<?= $value['Image'] ?>" alt="Card image cap" width=300px height=400px >
					<div class="card-block">
						<h4 class="card-title ten"><?= $value['ProductName'] ?></h4>
						<p class="card-text">Price:<?= $value['Price'] ?></p>
						<p class="card-text">Product Detail:<?= $value['ProductDetail'] ?></p>
						<a href="" class="btn btn-primary">VIEW</a> </p>
						<a href="" class="btn btn-danger">BUY</a> </p>
						


					</div>
				</div>
				</div>

				<div class="col-sm-1">
				</div>
				<?php endforeach ?> ?>
				</div>
				</div>
			</div> <!-- end 1 card -->
		</div>

	<!-- 	form them nhan su -->
		<div class="container">
		<div class="text-center">
			<h3 class="display-3"> ADD PRODUCT </h3>
		</div>
		</div>
		<div class="row">
			<!-- <form method="post" enctype="multipart/form-data" action=" <?= base_url() ?>/index.php/nhansu/nhansu_add ">  -->
				<div class="form-group row">
					<label for="image" class="col-sm-2 form-control-label text-right">Image</label>
					<div class="col-sm-10">
						<input name="image" type="text" class="form-control" id="image" placeholder="Nhap link anh">
					</div>
				</div>	
				<div class="form-group row">
					<label for="productname" class="col-sm-2 form-control-label text-right">Product Name</label>
					<div class="col-sm-10">
						<input name="productname" type="text" class="form-control" id="productname" placeholder="Nhap ten">
					</div>
				</div>
				<div class="form-group row">
					<label for="price" class="col-sm-2 form-control-label text-right">Price</label>
					<div class="col-sm-10">
						<input name="price" type="text" class="form-control" id="price" placeholder="Nhap gia">
					</div>
				</div>	
				<div class="form-group row">
					<label for="productdetail" class="col-sm-2 form-control-label text-right">Product Detail</label>
					<div class="col-sm-10">
						<input name="productdetail" type="text" class="form-control" id="productdetail" placeholder="Nhap mo ta">
					</div>
				</div>	
				
				

				<div class="form-group row text-center">
					<div class="col-sm-6 text-right">
						<button type="button" class="btn btn-primary nutxulyajax">Add</button>
					</div>
					<div class="col-sm-6 text-left">
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
					
			<!--  </form>  -->
		</div>

	</div>

	<!-- xu ly ajax -->
	<script>

		/*duongdan= '<?php  ?>';

		$('#image').fileupload({
        url: duongdan,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
               filename=file.url;
            });
        }
        })
*/
		$('.nutxulyajax').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: 'nhansu/ajax_add',
				type: 'POST',
				dataType: 'json',
				data: {
					productname: $('productname').val(),
					price: $('#price').val(),
					productdetail: $('#productdetail').val(),
					image: $('#image').val(),
					
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				noidung='<div class="col-sm-3">';
				noidung+='<div class="card">';
				noidung+='<img class="card-img-top img-fluid" src="'+$('#image').val()+'" alt="Card image cap">  width=300px height=400px ';
				noidung+='<div class="card-block">';
				noidung+='<h4 class="card-title ProductName">' + $('#productname').val() + '</h4>';
				noidung+='<p class="card-text">Price:'+ $('#price').val() + '</p>';
				noidung+='<p class="card-text">Product Detail:'+ $('#productdetail').val() + '</p>';
			
				noidung+='<a href="<?= base_url() ?>/index.php/nhansu/nhansu_edit/'+ $('#ID').val() + '" class="btn btn-primary">Sua</a> </p>';
				noidung+='<a href="<?= base_url() ?>/index.php/nhansu/nhansu_delete/'+ $('#ID').val() + '" class="btn btn-danger">Xoa</a> </p>';


						
				$('.card-deck').append(noidung);

				//reset nhap
				$('#productname').val('');
				$('#price').val('');
				$('#productdetail').val('');
				$('#image').val('');

			});
			
		});	
	</script>

 
 
  
 
</body>
</html>