<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
	/**
	 * 
	 */
	class thuonghieu
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// thêm thương hiệu sản phẩm
		public function them_thuonghieusp($Tenthuonghieu){

			$Tenthuonghieu = $this->fm->validation($Tenthuonghieu);
			$Tenthuonghieu = mysqli_real_escape_string($this->db->link, $Tenthuonghieu);
			
			if(empty($Tenthuonghieu)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "INSERT INTO bang_thuonghieu(Tenthuonghieu) VALUES('$Tenthuonghieu')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>More successful brands</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>More failed brands</span>";
					return $alert;
				}
			}
		}

		// liệt kê thương hiệu
		public function lietke_thuonghieusp(){
			$query = "SELECT * FROM bang_thuonghieu order by Idthuonghieu desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getbrandbyId($id){
			$query = "SELECT * FROM bang_thuonghieu where Idthuonghieu = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function sua_thuonghieu($Tenthuonghieu,$id){

			$Tenthuonghieu = $this->fm->validation($Tenthuonghieu);
			$Tenthuonghieu = mysqli_real_escape_string($this->db->link, $Tenthuonghieu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($Tenthuonghieu)){
				$alert = "<span class='error'>Can't be left blank</span>";
				return $alert;
			}else{
				$query = "UPDATE bang_thuonghieu SET Tenthuonghieu = '$Tenthuonghieu' WHERE Idthuonghieu = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Successful brand update</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Brand update failed</span>";
					return $alert;
				}
			}

		}
		public function xoa_thuonghieu($id){
			$query = "DELETE FROM bang_thuonghieu where Idthuonghieu = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span>Successful brand removal</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Brand removal failed</span>";
				return $alert;
			}
			
		}
		


	}
?>