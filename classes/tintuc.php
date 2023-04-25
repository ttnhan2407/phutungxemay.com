<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
	/**
	 * 
	 */
	class tintuc
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// thêm danh mục tin tức
		public function them_danhmuc_tintuc($Tieude,$Mota,$Tinhtrang){

			$Tieude = $this->fm->validation($Tieude);
			$Mota = $this->fm->validation($Mota);
			$Tinhtrang = $this->fm->validation($Tinhtrang);
			$Tieude = mysqli_real_escape_string($this->db->link, $Tieude);
			$Mota = mysqli_real_escape_string($this->db->link, $Mota);
			$Tinhtrang = mysqli_real_escape_string($this->db->link, $Tinhtrang);
			
			if(empty($Tieude) || empty($Mota)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "INSERT INTO bang_danhmuctintuc(Tieude, Mota, Tinhtrang) VALUES('$Tieude','$Mota','$Tinhtrang')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Add success news category</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Add news category failed</span>";
					return $alert;
				}
			}
		}

		// Liệt kê danh muc tin tức
		public function lietke_danhmuc_tintuc(){
			$query = "SELECT * FROM bang_danhmuctintuc order by Iddanhmuc desc";
			$result = $this->db->select($query);
			return $result;
		}

		// sửa danh mục sản phẩm
		public function sua_dm_tintuc($Tieude,$Mota,$Tinhtrang,$id){

			$Tieude = $this->fm->validation($Tieude);
			$Mota = $this->fm->validation($Mota);
			$Tinhtrang = $this->fm->validation($Tinhtrang);
			$Tieude = mysqli_real_escape_string($this->db->link, $Tieude);
			$Mota = mysqli_real_escape_string($this->db->link, $Mota);
			$Tinhtrang = mysqli_real_escape_string($this->db->link, $Tinhtrang);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($Tieude)  || empty($Mota)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "UPDATE bang_danhmuctintuc SET Tieude = '$Tieude',Mota = '$Mota',Tinhtrang = '$Tinhtrang' WHERE Iddanhmuc = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'> Update news catalog successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Update news catalog failed</span>";
					return $alert;
				}
			}

		}

		// Xóa danh mục tin tức 
		public function xoa_dm_tintuc($id){
			$query = "DELETE FROM bang_danhmuctintuc where Iddanhmuc = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete news category successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Delete news category failed</span>";
				return $alert;
			}
			
		}
		public function tintuc($id){
			$query = "SELECT * FROM bang_danhmuctintuc where Iddanhmuc = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
 // ***************************************************************************
		//Thêm Tin Tức
		public function Them_tintuc ($data,$files){

			
			$Tentintuc = mysqli_real_escape_string($this->db->link, $data['Tentintuc']);
			$Mota = mysqli_real_escape_string($this->db->link, $data['Mota']);
			$Noidung = mysqli_real_escape_string($this->db->link, $data['Noidung']);
			$Danhmuctintuc = mysqli_real_escape_string($this->db->link, $data['Danhmuctintuc']);
			$Trangthai = mysqli_real_escape_string($this->db->link, $data['Trangthai']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Hinhanh']['name'];
			$file_size = $_FILES['Hinhanh']['size'];
			$file_temp = $_FILES['Hinhanh']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;
			
			if($Tentintuc=="" || $Mota=="" || $Noidung=="" || $Danhmuctintuc=="" || $Trangthai =="" || $file_name ==""){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO bang_tintuc(Tentintuc,Mota,Noidung,Danhmuctintuc,Trangthai,Hinhanh) VALUES('$Tentintuc','$Mota','$Noidung','$Danhmuctintuc','$Trangthai','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>More success news</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>More failed news</span>";
					return $alert;
				}
			}
		}
		//Liệt kê tin tức
		public function lietke_tintuc(){
			$query = "

			SELECT bang_tintuc.*, bang_danhmuctintuc.Tieude 

			FROM bang_tintuc INNER JOIN bang_danhmuctintuc ON bang_tintuc.Danhmuctintuc = bang_danhmuctintuc.Iddanhmuc

			order by bang_tintuc.Idtintuc desc";

			$result = $this->db->select($query);
			return $result;
		}

		
		public function lietketintuc($id){
			$query = "SELECT * FROM bang_tintuc WHERE Idtintuc='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		

		//xóa tin tức
		public function xoa_tintuc($id){
			$query = "DELETE FROM bang_tintuc where Idtintuc = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete news successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Delete failed news</span>";
				return $alert;
			}
			
		}
		// Cập nhật sản phẩm
		public function sua_tintuc($data,$files,$id){

		
			$Tentintuc = mysqli_real_escape_string($this->db->link, $data['Tentintuc']);
			$Mota = mysqli_real_escape_string($this->db->link, $data['Mota']);
			$Noidung = mysqli_real_escape_string($this->db->link, $data['Noidung']);
			$Tieude = mysqli_real_escape_string($this->db->link, $data['Tieude']);
			$Trangthai = mysqli_real_escape_string($this->db->link, $data['Trangthai']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Hinhanh']['name'];
			$file_size = $_FILES['Hinhanh']['size'];
			$file_temp = $_FILES['Hinhanh']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;


			if($Tentintuc=="" || $Mota=="" || $Noidung=="" || $Tieude=="" || $Trangthai ==""){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE bang_tintuc SET
					Tentintuc = '$Tentintuc',
					Mota = '$Mota', 
					Noidung = '$Noidung', 
					Danhmuctintuc = '$Tieude',
					Trangthai = '$Trangthai',
					Hinhanh = '$unique_image'
					WHERE Idtintuc = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE bang_tintuc SET
					Tentintuc = '$Tentintuc',
					Mota = '$Mota', 
					Noidung = '$Noidung', 
					Danhmuctintuc = '$Tieude',
					Trangthai = '$Trangthai'
					
					WHERE Idtintuc = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Successful news update</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>News update failed</span>";
						return $alert;
					}
				
			}

		}
		

		// fontend
		//hiển thị danh mục tin tức
		public function hienthi_danhmuc_tintuc(){
			$query = "SELECT * FROM bang_danhmuctintuc order by Iddanhmuc desc";
			$result = $this->db->select($query);
			return $result;
		}
		// tin tức
		public function Show_tintuc($id){
			$query = "SELECT * FROM bang_tintuc WHERE Danhmuctintuc='$id' order by Danhmuctintuc desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		// Tên danh tin tức
		public function Tendanhmuc($id){
			$query = "SELECT bang_tintuc.*,bang_danhmuctintuc.Tieude,bang_danhmuctintuc.Iddanhmuc FROM bang_tintuc,bang_danhmuctintuc WHERE bang_tintuc.Danhmuctintuc=bang_danhmuctintuc.Iddanhmuc AND bang_tintuc.Danhmuctintuc ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function chitiettintuc($id){
			$query = "

			SELECT bang_tintuc.*, bang_danhmuctintuc.Tieude

			FROM bang_tintuc INNER JOIN bang_danhmuctintuc ON bang_tintuc.Danhmuctintuc = bang_danhmuctintuc.Iddanhmuc 

			WHERE bang_tintuc.Idtintuc = '$id'

			";

			$result = $this->db->select($query);
			return $result;
		}
		


	}

	
?>