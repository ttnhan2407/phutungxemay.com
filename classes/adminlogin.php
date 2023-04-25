<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */
	class adminlogin
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($Emailadmin,$Matkhauadmin){
			$Emailadmin = $this->fm->validation($Emailadmin);
			$Matkhauadmin = $this->fm->validation($Matkhauadmin);

			$Emailadmin = mysqli_real_escape_string($this->db->link, $Emailadmin);
			$Matkhauadmin = mysqli_real_escape_string($this->db->link, $Matkhauadmin);

			if(empty($Emailadmin) || empty($Matkhauadmin)){
				$alert = "Email and Password are not blank";
				return $alert;
			}else{
				$query = "SELECT * FROM bang_admin WHERE Emailadmin = '$Emailadmin' AND Matkhauadmin = '$Matkhauadmin'";
				$result = $this->db->select($query);

				if($result != false){

					$value = $result->fetch_assoc();

					Session::set('adminlogin', true);

					Session::set('Idadmin', $value['Idadmin']);
					Session::set('Emailadmin', $value['Emailadmin']);
					Session::set('Tenadmin', $value['Tenadmin']);
					header('Location:index.php');

				}else{
					$alert = "Email or password is incorrect";
					return $alert;
				}
			}
		}


	}
?>