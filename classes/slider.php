<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class slider
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// thêm slider
		public function them_slider($data,$files){
			$Tenslider = mysqli_real_escape_string($this->db->link, $data['Tenslider']);
			$Trangthai = mysqli_real_escape_string($this->db->link, $data['Trangthai']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['Anhslider']['name'];
			$file_size = $_FILES['Anhslider']['size'];
			$file_temp = $_FILES['Anhslider']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;


			if($Tenslider=="" || $Trangthai==""){
				$alert = "<span class='error'>Image cannot be blank</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>The image size is too large!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO bang_slider(Tenslider,Trangthai,Anhslider) VALUES('$Tenslider','$Trangthai','$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Successfully added slider</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Add slider failed</span>";
						return $alert;
					}
				}
				
				
			}
		}

	
		//Liet ke slider
		public function danhsach_slider(){
			$query = "SELECT * FROM bang_slider order by Idslider desc";
			$result = $this->db->select($query);
			return $result;
		}
			
		public function Capnhat_Trangthai_slider($id,$Trangthai){

			$Trangthai = mysqli_real_escape_string($this->db->link, $Trangthai);
			$query = "UPDATE bang_slider SET Trangthai = '$Trangthai' where Idslider='$id'";
			$result = $this->db->update($query);
			return $result;
		}

		// sửa slider 
		public function sua_slider($data,$files,$id){
			$Tenslider = mysqli_real_escape_string($this->db->link, $data['Tenslider']);
			$Trangthai = mysqli_real_escape_string($this->db->link, $data['Trangthai']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['Anhslider']['name'];
			$file_size = $_FILES['Anhslider']['size'];
			$file_temp = $_FILES['Anhslider']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;


			if($Tenslider=="" || $Trangthai==""){
				$alert = "<span class='error'>Image cannot be blank</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>The image size is too large!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE bang_slider SET
					Tenslider = '$Tenslider',
					Anhslider = '$unique_image',
					Trangthai = '$Trangthai'
					WHERE Idslider = '$id'";
				}else{

					//Nếu người dùng không chọn ảnh
					$query = "UPDATE bang_slider SET
					Tenslider = '$Tenslider',
					Trangthai = '$Trangthai'
					WHERE Idslider = '$id'";
				}
					$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Update successful</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Update failed</span>";
						return $alert;
					}
				
				
			}
		}
		
		public function getsliderbyid($id){
			$query = "SELECT * FROM bang_slider where Idslider = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function xoa_slider($id){
			$query = "DELETE FROM bang_slider where Idslider = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete slider successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Delete slider failed</span>";
				return $alert;
			}
		}


		//Frontend
		public function show_slider(){
			$query = "SELECT * FROM bang_slider where Trangthai='1' order by Idslider desc";
			$result = $this->db->select($query);
			return $result;
		}
		

	}
?>