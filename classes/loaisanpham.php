<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
	/**
	 * 
	 */
	class loaisanpham
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// thêm loại sản phẩm
		public function them_loaisp($Tenloai){

			$Tenloai = $this->fm->validation($Tenloai);
			$Tenloai = mysqli_real_escape_string($this->db->link, $Tenloai);
			
			if(empty($Tenloai)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "INSERT INTO bang_loaisp(Tenloai) VALUES('$Tenloai')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>More successful product categories</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Add failed product categories</span>";
					return $alert;
				}
			}
		}

		// Liệt kê loại sản phẩm
		public function lietke_loaisp(){
			$query = "SELECT * FROM bang_loaisp order by Idloai desc";
			$result = $this->db->select($query);
			return $result;
		}

		// sửa danh mục sản phẩm
		public function sua_loaisp($Tenloai,$id){

			$Tenloai = $this->fm->validation($Tenloai);
			$Tenloai = mysqli_real_escape_string($this->db->link, $Tenloai);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($Tenloai)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "UPDATE bang_loaisp SET Tenloai = '$Tenloai' WHERE Idloai = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Successfully updated product categories</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Product categories update failed</span>";
					return $alert;
				}
			}

		}

		// Xóa loại sản phẩm 
		public function xoa_loaisp($id){
			$query = "DELETE FROM bang_loaisp where Idloai = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete product categories successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Product categories deletion failed</span>";
				return $alert;
			}
			
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM bang_loaisp where Idloai = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		// fontend
		//hiển thị loại sản phẩm
		public function hienthi_loaisanpham(){
			$query = "SELECT * FROM bang_loaisp order by Idloai desc";
			$result = $this->db->select($query);
			return $result;
		}
		// loai san pham
		public function Loaisanpham($id){
			$query = "SELECT * FROM bang_sanpham WHERE Idloaisp='$id' order by Idloaisp desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT bang_sanpham.*,bang_loaisp.Tenloai,bang_loaisp.Idloai FROM bang_sanpham,bang_loaisp WHERE bang_sanpham.Idloaisp=bang_loaisp.Idloai AND bang_sanpham.Idloaisp ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		


	}
?>