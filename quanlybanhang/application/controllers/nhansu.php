<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'UploadHandler.php';
class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getAllData();
		$ketqua=array("mangketqua"=>$ketqua);
		$this->load->view('nhansu_view',$ketqua);
	}
	function nhansu_add()
	{
			

		$ten= $this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');
		$linkfb=$this->input->post('linkfb');
		$anhavatar=base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);

		$this->load->model('nhansu_model');
		if ($this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang))
			{
				echo "insert thanh cong";
			}
			else {
					echo "insert that bai";
				}	

	} 
	function nhansu_edit($idnhanduoc)
		{
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->editDataById($idnhanduoc);
		$ketqua=array('mangketqua'=>$ketqua);

		$this->load->view('editData_view', $ketqua, FALSE);

		}	
	function nhansu_update()
		{
			$id=$this->input->post('id');
			$ten=$this->input->post('ten');
			$tuoi=$this->input->post('tuoi');
			$linkfb=$this->input->post('linkfb');
			//$anhavatar=$this->input->post('anhavatar');
			$sodonhang=$this->input->post('sodonhang');

			//xu ly phan anh

		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		/*if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$anhavatar=$anhavatar=base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
		if ($anhavatar) $anhavatar=$anhavatar=base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
		else {$anhavatar=$this->input->post('anhavatar');}
			//ket thuc phan xu ly anh

			$this->load->model('nhansu_model');
			$this->nhansu_model->updateDataById($id,$ten,$tuoi,$linkfb,$sodonhang,$anhavatar);
		}	

		function nhansu_delete($idnhanduoc)
		{	
			$this->load->model('nhansu_model');
			if ($this->nhansu_model->deleteDataById($idnhanduoc)) {
				 echo "xoa thanh cong";}
			
		}
		function ajax_add()
		{
			echo "xoa thanh cong";
			$productname= $this->input->post('productname');
			$price=$this->input->post('price');
			$productdetail=$this->input->post('productdetail');
			$image=$this->input->post('image');
			$this->load->model('nhansu_model');
			if ($this->nhansu_model->insertDataToMysql($productname,$price,$productdetail,$image))
				{
					echo "insert thanh cong";
				}
				else {
						echo "insert that bai";
					}	
			
		}
		function uploadfile()
		{
			$uploadfile=new UploadHandler;
		}
		
}

	//xu ly phanuploadanh



/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */