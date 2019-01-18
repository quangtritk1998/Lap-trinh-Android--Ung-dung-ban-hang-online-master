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
  <link rel="stylesheet" href="<?php echo base_url() ?>2.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>2.js">
</head>
<body>
<div class="container">
		<div class="text-center">
			<h3 class="display-3"> Sua thong tin nhan vien</h3>
		</div>
		</div>
		
			
		
		<div class="row">
			<form method="post" enctype="multipart/form-data" action=" <?= base_url() ?>/index.php/nhansu/nhansu_update ">
				<?php foreach ($mangketqua as $value): ?>
				<div class="form-group row">
					<div class="col-sm-10">
						<input value="<?= $value['id'] ?>" name="id" type="hidden" class="form-control" id="id" placeholder="Nhap tuoi">
					</div>

					<label for="anhavatar" class="col-sm-2 form-control-label text-right">Avatar</label>
					
					<div class="col-sm-10">
						<input name="anhavatar" type="file" class="form-control" id="anhavatar" placeholder="upload anh">
					</div>
				</div>	
				<div class="form-group row">
					<label for="ten" class="col-sm-2 form-control-label text-right">Ten</label>
					<div class="col-sm-10">
						<input value="<?= $value['ten'] ?>" name="ten" type="text" class="form-control" id="ten" placeholder="Nhap ten">
					</div>
				</div>
				<div class="form-group row">
					<label for="tuoi" class="col-sm-2 form-control-label text-right">Tuoi</label>
					<div class="col-sm-10">
						<input value="<?= $value['tuoi'] ?>" name="tuoi" type="text" class="form-control" id="tuoi" placeholder="Nhap tuoi">
					</div>
				</div>	
				<div class="form-group row">
					<label for="sdt" class="col-sm-2 form-control-label text-right">So dien thoai</label>
					<div class="col-sm-10">
						<input value="<?= $value['sdt'] ?>" name="sdt" type="text" class="form-control" id="sdt" placeholder="Nhap so dien thoai">
					</div>
				</div>	
				<div class="form-group row">
					<label for="sodonhang" class="col-sm-2 form-control-label text-right">So don hang</label>
					<div class="col-sm-10">
						<input value="<?= $value['sodonhang'] ?>" name="sodonhang" type="text" class="form-control" id="sodonhang" placeholder="Nhap so don hang">
					</div>
				</div>
				<div class="form-group row">
					<label for="linkfb" class="col-sm-2 form-control-label text-right">Link Facebook</label>
					<div class="col-sm-10">
						<input value="<?= $value['linkfb'] ?>" name="linkfb" type="text" class="form-control" id="linkfb" placeholder="Nhap link facebook">
					</div>
				</div>	
				<?php endforeach ?>

				<div class="form-group row text-center">
					<div class="col-sm-6 text-right">
						<button type="submit" class="btn btn-primary">Luu lai</button>
					</div>
					<div class="col-sm-6 text-left">
						<button type="reset" class="btn btn-danger">Nhap lai</button>
					</div>
					
			</form>	
		</div>
		

	</div>
</form>
<body>
