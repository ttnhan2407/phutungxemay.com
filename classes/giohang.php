<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class giohang
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// thêm vào giỏ hàng
		public function them_sp_giohang($Soluong, $id){

			$Soluong = $this->fm->validation($Soluong);
			$Soluong = mysqli_real_escape_string($this->db->link, $Soluong);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$Idgiaodich = session_id();
			$check_cart = "SELECT * FROM bang_giohang WHERE Idsanpham = '$id' AND Idgiaodich ='$Idgiaodich'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='error'>Product added to cart</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM bang_sanpham WHERE Idsanpham = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$Anhsanpham = $result["Anhsanpham"];
			$Giaban = $result["Giaban"];
			$Tensp = $result["Tensp"];

			
			
			$query_insert = "INSERT INTO bang_giohang(Idsanpham,Soluong,Idgiaodich,Anhsanpham,Giaban,Tensp) VALUES('$id','$Soluong','$Idgiaodich','$Anhsanpham','$Giaban','$Tensp')";
			$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					$msg = "<span class='error'>Add to cart successfully</span>";
				}else{
					header("Location:404.php");
				}
			}
			
		}
		

		// san phẩm trong giỏ
		public function sanpham_giohang(){
			$Idgiaodich = session_id();
			$query = "SELECT * FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$result = $this->db->select($query);
			return $result;
		}
		//cập nhật sản phẩm trong giỏ
		public function capnhat_sp_giohanng($Soluong, $Idgiohang){
			$Soluong = mysqli_real_escape_string($this->db->link, $Soluong);
			$Idgiohang = mysqli_real_escape_string($this->db->link, $Idgiohang);
			$query = "UPDATE bang_giohang SET

					Soluong = '$Soluong'

					WHERE Idgiohang = '$Idgiohang'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Product update in cart successfully</span>";
			}else{
				$msg = "<span class='error'>Product update in cart failed</span>";
				return $msg;
			}
		
		}
		// xóa sản phẩm trong giỏ hàng
		public function xoa_sp_giohang($Idgiohang){
			$Idgiohang = mysqli_real_escape_string($this->db->link, $Idgiohang);
			$query = "DELETE FROM bang_giohang WHERE Idgiohang = '$Idgiohang'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='success'>Product removed from cart successfully</span>";
			}else{
				$msg = "<span class='error'>Deleting products in cart failed</span>";
				return $msg;
			}
		}

		public function kiemtra_giohang(){
			$Idgiaodich = session_id();
			$query = "SELECT * FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$result = $this->db->select($query);
			return $result;
		}
		//xóa khi đăng xuất
		public function xoa_dulieu_giohang(){
			$Idgiaodich = session_id();
			$query = "DELETE FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$result = $this->db->select($query);
			return $result;
		}

		//xóa khi đăng xuất
		public function xoa_dulieu_giohangonline(){
			$Idgiaodich = session_id();
			$query = "DELETE FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$result = $this->db->select($query);
			return $result;
		}

		//Đặt hàng
		public function dat_hang($Idkhachhang){
			$Idgiaodich = session_id();
			$query = "SELECT * FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$Idsanpham = $result['Idsanpham'];
					$Tensp = $result['Tensp'];
					$Soluong = $result['Soluong'];
					$Giaban = $result['Giaban'] * $Soluong;
					$Anhsanpham = $result['Anhsanpham'];
					$Idkhachhang = $Idkhachhang;
					$query_order = "INSERT INTO bang_dathang(Idsanpham,Tensp,Soluong,Giaban,Anhsanpham,Idkhachhang) VALUES('$Idsanpham','$Tensp','$Soluong','$Giaban','$Anhsanpham','$Idkhachhang')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		//Đặt hàng online
		public function dat_hangonline($Idkhachhang){
			$Idgiaodich = session_id();
			$query = "SELECT * FROM bang_giohang WHERE Idgiaodich = '$Idgiaodich'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$Idsanpham = $result['Idsanpham'];
					$Tensp = $result['Tensp'];
					$Soluong = $result['Soluong'];
					$Giaban = $result['Giaban'] * $Soluong;
					$Anhsanpham = $result['Anhsanpham'];
					$Idkhachhang = $Idkhachhang;
					$query_order = "INSERT INTO bang_dathang(Idsanpham,Tensp,Soluong,Giaban,Anhsanpham,Idkhachhang) VALUES('$Idsanpham','$Tensp','$Soluong','$Giaban','$Anhsanpham','$Idkhachhang')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}

		//tổng số tiền của đơn hàng
		public function so_tien($Idkhachhang){
		
			$query = "SELECT Giaban FROM bang_dathang WHERE Idkhachhang = '$Idkhachhang'";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		
		//tình trạng đơn hàng
		public function tinhtrang_donhang($Idkhachhang){
			$query = "SELECT * FROM bang_dathang WHERE Idkhachhang = '$Idkhachhang'";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		//Xử lý đơn hàng
		public function shifted($Iddathang,$thoigian,$Giaban){
			$Iddathang = mysqli_real_escape_string($this->db->link, $Iddathang);
			$thoigian = mysqli_real_escape_string($this->db->link, $thoigian);
			$Giaban = mysqli_real_escape_string($this->db->link, $Giaban);
			$query = "UPDATE bang_dathang SET

					Tinhtrang = '1'

					WHERE Iddathang = '$Iddathang' AND Ngaymua='$thoigian' AND Giaban ='$Giaban'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Successful handling</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Update Order Not Successfully</span>";
				return $msg;
			}
		}
		//khách hàng nhận hàng
		public function shifted_confirm($Iddathang,$thoigian,$Giaban){
			$Iddathang = mysqli_real_escape_string($this->db->link, $Iddathang);
			$thoigian = mysqli_real_escape_string($this->db->link, $thoigian);
			$Giaban = mysqli_real_escape_string($this->db->link, $Giaban);
			$query = "UPDATE bang_dathang SET

					Tinhtrang = '2'

					WHERE Idkhachhang= '$Iddathang' AND Ngaymua='$thoigian' AND Giaban ='$Giaban'";
			$result = $this->db->update($query);
			return $result;
		}
		
		// Thông tin hóa đơn
		public function get_inbox_cart(){
			$query = "SELECT * FROM bang_dathang ORDER BY Ngaymua";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		public function check_order($Idkhachhang){
			$Idgiaodich = session_id();
			$query = "SELECT * FROM bang_dathang WHERE Idkhachhang = '$Idkhachhang'";
			$result = $this->db->select($query);
			return $result;
		}
		
		// Xóa hóa đơn
		public function xoa_hoadon($Iddathang,$thoigian,$Giaban){
			$Iddathang = mysqli_real_escape_string($this->db->link, $Iddathang);
			$thoigian = mysqli_real_escape_string($this->db->link, $thoigian);
			$Giaban = mysqli_real_escape_string($this->db->link, $Giaban);
			$query = "DELETE FROM bang_dathang 
					WHERE Iddathang = '$Iddathang' AND Ngaymua='$thoigian' AND Giaban ='$Giaban'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Delete invoice successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Unsuccessful invoice deletion</span>";
				return $msg;
			}
		}

		public function tong_donhang(){
            //Execute the query to get the total number of orders
            $query = "SELECT COUNT(*) AS tong_donhang FROM bang_dathang WHERE Iddathang != '4'";
            //Get total order value from query result
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            $tong_donhang = $row['tong_donhang'];
            //Return the total order value
            return $tong_donhang;
        }
        public function tong_soluong_donhang(){
        
            $query = "SELECT SUM(Soluong) AS tong_soluong_donhang FROM bang_dathang WHERE Iddathang != '4'";
            
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            $tong_soluong_donhang = $row['tong_soluong_donhang'];
            
            return $tong_soluong_donhang;
        }
        public function tong_danhthu_donhang(){
            
            $query = "SELECT SUM(Giaban) AS tong_danhthu_donhang FROM bang_dathang WHERE Iddathang != '4'";
            
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            $tong_danhthu_donhang = $row['tong_danhthu_donhang'];
            
            return $tong_danhthu_donhang;
        }
	}
?>