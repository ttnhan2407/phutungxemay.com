<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class khachhang
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function dangky_taikhoang($data){
			$Tenkhachhang = mysqli_real_escape_string($this->db->link, $data['Tenkhachhang']);
			$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$Diachi = mysqli_real_escape_string($this->db->link, $data['Diachi']);
			$Sophone = mysqli_real_escape_string($this->db->link, $data['Sophone']);
			$Matkhau = mysqli_real_escape_string($this->db->link, md5($data['Matkhau']));
			if($Tenkhachhang=="" || $Email=="" || $Diachi=="" || $Sophone =="" || $Matkhau ==""){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM bang_khachhang WHERE Email='$Email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email registered ! Please use another email</span>";
					return $alert;
				}else{
					$query = "INSERT INTO bang_khachhang(Tenkhachhang,Email,Diachi,Sophone,Matkhau) VALUES('$Tenkhachhang','$Email','$Diachi','$Sophone','$Matkhau')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Account successfully created</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Account creation failed</span>";
						return $alert;
					}
				}
			}
		}
		public function khachhang_dangnhap($data){
			$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$Matkhau = mysqli_real_escape_string($this->db->link, md5($data['Matkhau']));
			if($Email=='' || $Matkhau==''){
				$alert = "<span class='error'>Password and Email cannot be blank</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM bang_khachhang WHERE Email='$Email' AND Matkhau='$Matkhau'";
				$result_check = $this->db->select($check_login);
				if($result_check){
					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['Idkhachhang']);
					Session::set('customer_name',$value['Tenkhachhang']);
					  echo "<script> window.location ='index.php'</script>";
				}else{
					$alert = "<span class='error'>Email or password is incorrect</span>";
					return $alert;
				}
			}
		}
		public function thongtin_khachhang($Idkhachhang){
			$query = "SELECT * FROM bang_khachhang WHERE Idkhachhang='$Idkhachhang'";
			$result = $this->db->select($query);
			return $result;
		}
		public function capnhat_thongtin($data, $Idkhachhang){
			$Tenkhachhang = mysqli_real_escape_string($this->db->link, $data['Tenkhachhang']);
			$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
			$Diachi = mysqli_real_escape_string($this->db->link, $data['Diachi']);
			$Sophone = mysqli_real_escape_string($this->db->link, $data['Sophone']);
			if($Tenkhachhang=="" || $Email=="" || $Diachi=="" || $Sophone =="" ){
				$alert = "<span class='error'>Không được dể trống</span>";
				return $alert;
			}else{
				$query = "UPDATE bang_khachhang SET Tenkhachhang='$Tenkhachhang',Email='$Email',Diachi='$Diachi',Sophone='$Sophone' WHERE Idkhachhang ='$Idkhachhang'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Update successful</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Update failed</span>";
						return $alert;
				}
				
			}
		}

		
		


	}
?>