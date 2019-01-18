<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertDataToMysql($productname,$price,$productdetail,$image)
	{
		$dulieu=array(
			'ProductName'=> $productname,
			'Price'=> $price,
			'ProductDetail'=> $productdetail,
			'Image'=>$image,
		);
		$this->db->insert('device', $dulieu);
		return $this->db->insert_id();
	}
	function getAllData()
	{
		$this->db->select('*');
		$dulieu=$this->db->get('product');
		$dulieu=$dulieu->result_array();
		return $dulieu;	
	}
	function editDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$ketqua=$this->db->get('nhan_vien');
		$ketqua=$ketqua->result_array();
		//echo "<pre>";
		//var_dump($ketqua);
		return $ketqua;
	}
	function updateDataById($id,$ten,$tuoi,$linkfb,$sodonhang,$anhavatar)
	{
		$data= array (
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang,
			'anhavatar' => $anhavatar

		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);	
	}
	function deleteDataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */