<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>



<?php
	class sanpham
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm sản phẩm
		public function Them_sanpham ($data,$files){

			
			$Tensp = mysqli_real_escape_string($this->db->link, $data['Tensp']);
			$Giaban = mysqli_real_escape_string($this->db->link, $data['Giaban']);
			$Mota = mysqli_real_escape_string($this->db->link, $data['Mota']);
			$Noidung = mysqli_real_escape_string($this->db->link, $data['Noidung']);
			$loaisanpham = mysqli_real_escape_string($this->db->link, $data['loaisanpham']);
			$thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
			$Thuoctinh = mysqli_real_escape_string($this->db->link, $data['Thuoctinh']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Anhsanpham']['name'];
			$file_size = $_FILES['Anhsanpham']['size'];
			$file_temp = $_FILES['Anhsanpham']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;
			
			if($Tensp=="" || $Giaban=="" || $Mota=="" || $Noidung=="" || $loaisanpham=="" || $thuonghieu=="" || $Thuoctinh =="" || $file_name ==""){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO bang_sanpham(Tensp,Giaban,Mota,Noidung,Idloaisp,Idthuonghieusp,Thuoctinh,Anhsanpham) VALUES('$Tensp','$Giaban','$Mota','$Noidung','$loaisanpham','$thuonghieu','$Thuoctinh','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>More successful products</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Add product failed</span>";
					return $alert;
				}
			}
		}

		//Liệt kê sản phẩm
		public function lietke_sanpham(){
			$query = "

			SELECT bang_sanpham.*, bang_loaisp.Tenloai, bang_thuonghieu.Tenthuonghieu 

			FROM bang_sanpham INNER JOIN bang_loaisp ON bang_sanpham.Idloaisp = bang_loaisp.Idloai 

			INNER JOIN bang_thuonghieu ON bang_sanpham.Idthuonghieusp = bang_thuonghieu.Idthuonghieu 

			order by bang_sanpham.Idsanpham desc";

			$result = $this->db->select($query);
			return $result;
		}

		// Cập nhật sản phẩm
		public function Cap_nhat_sp($data,$files,$id){

		
			$Tensp = mysqli_real_escape_string($this->db->link, $data['Tensp']);
			$Giaban = mysqli_real_escape_string($this->db->link, $data['Giaban']);
			$Mota = mysqli_real_escape_string($this->db->link, $data['Mota']);
			$Noidung = mysqli_real_escape_string($this->db->link, $data['Noidung']);
			$loaisanpham = mysqli_real_escape_string($this->db->link, $data['loaisanpham']);
			$thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
			$Thuoctinh = mysqli_real_escape_string($this->db->link, $data['Thuoctinh']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Anhsanpham']['name'];
			$file_size = $_FILES['Anhsanpham']['size'];
			$file_temp = $_FILES['Anhsanpham']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "hinhanh/".$unique_image;


			if($Tensp=="" || $Giaban=="" || $Mota=="" || $Noidung=="" || $loaisanpham=="" || $thuonghieu=="" || $Thuoctinh ==""){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {

		    		 $alert = "<span class='success'>Large image file</span>";
					return $alert;
				    } 
					elseif ($Giaban < 0) {

						$alert = "<span class='success'>The price must be positive</span>";
					   return $alert;
					   } 
					elseif (in_array($file_ext, $permited) === false) 
					{	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE bang_sanpham SET
					Tensp = '$Tensp',
					Giaban = '$Giaban',
					Mota = '$Mota', 
					Noidung = '$Noidung', 
					Idloaisp = '$loaisanpham',
					Idthuonghieusp = '$thuonghieu',
					Thuoctinh = '$Thuoctinh',
					Anhsanpham = '$unique_image'
					WHERE Idsanpham = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE bang_sanpham SET
					Tensp = '$Tensp',
					Giaban = '$Giaban',
					Mota = '$Mota', 
					Noidung = '$Noidung', 
					Idloaisp = '$loaisanpham',
					Idthuonghieusp = '$thuonghieu',
					Thuoctinh = '$Thuoctinh'
					
					WHERE Idsanpham = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Product update successful</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Product update failed</span>";
						return $alert;
					}
				
			}

		}

		//xóa sản phẩm
		public function xoa_san_pham($id){
			$query = "DELETE FROM bang_sanpham where Idsanpham = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Delete product successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Deleting failed products</span>";
				return $alert;
			}
			
		}
		public function getproductbyId($id){
			$query = "SELECT * FROM bang_sanpham where Idsanpham = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		// sản phẩm nổi bật
		public function sanphamnoibat(){
			$query = "SELECT * FROM bang_sanpham where Thuoctinh = '1' order by Idsanpham desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		} 
		// sản phẩm mới
		public function sanphammoi(){
			$sanpham_trentrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tungtrang = ($trang-1)*$sanpham_trentrang;
			$query = "SELECT * FROM bang_sanpham order by Idsanpham desc LIMIT $tungtrang,$sanpham_trentrang ";
			$result = $this->db->select($query);
			return $result;
		} 
		// sản phẩm của trang sam pham
		public function tatca_sanpham(){
			$sanpham_trentrang = 10;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tungtrang = ($trang-1)*$sanpham_trentrang;
			$query = "SELECT * FROM bang_sanpham order by Idsanpham desc LIMIT $tungtrang,$sanpham_trentrang ";
			$result = $this->db->select($query);
			return $result;
		} 
		// sp trang chủ
		public function sanpham(){
			$query = "SELECT * FROM bang_sanpham";
			$result = $this->db->select($query);
			return $result;
		}
		
		// chi tiết sản phẩm
		public function chitietsanpham($id){
			$query = " SELECT bang_sanpham.*, bang_loaisp.Tenloai, bang_thuonghieu.Tenthuonghieu 

			FROM bang_sanpham INNER JOIN bang_loaisp ON bang_sanpham.Idloaisp = bang_loaisp.Idloai 

			INNER JOIN bang_thuonghieu ON bang_sanpham.Idthuonghieusp = bang_thuonghieu.Idthuonghieu WHERE bang_sanpham.Idsanpham = '$id' ";

			$result = $this->db->select($query);
			return $result;
		}
		// Thêm sản phẩm yêu thích
		public function them_yeuthich($Idsanpham, $Idkhachhang){
			$Idsanpham = mysqli_real_escape_string($this->db->link, $Idsanpham);
			$Idkhachhang = mysqli_real_escape_string($this->db->link, $Idkhachhang);
			
			$check_wlist = "SELECT * FROM bang_yeuthich WHERE Idsanpham = '$Idsanpham' AND Idkhachhang ='$Idkhachhang'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>The product has been added to favorites</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM bang_sanpham WHERE Idsanpham = '$Idsanpham'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$Tensp = $result["Tensp"];
			$Giaban = $result["Giaban"];
			$Anhsanpham = $result["Anhsanpham"];

			
			
			$query_insert = "INSERT INTO bang_yeuthich(Idsanpham,Giaban,Anhsanpham,Idkhachhang,Tensp) VALUES('$Idsanpham','$Giaban','$Anhsanpham','$Idkhachhang','$Tensp')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span  class='success'>Like successful product</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Like unsuccessful products</span>";
						return $alert;
					}
			}

		}
		// liet ke san pham yeu thich
		public function sanpham_thich($Idkhachhang){
			$query = "SELECT * FROM bang_yeuthich WHERE Idkhachhang = '$Idkhachhang' order by Idsanpham desc";
			$result = $this->db->select($query);
			return $result;
		}
		// xoa san pham yeu thich
		public function xoa_sp_thich($proid,$Idkhachhang){
			$query = "DELETE FROM bang_yeuthich where Idsanpham = '$proid' AND Idkhachhang='$Idkhachhang'";
			$result = $this->db->delete($query);
			return $result;
		}
		// tìm kiếm sản phẩm
		public function timkiem_sanpham($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM bang_sanpham WHERE Tensp LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}


	}
?>