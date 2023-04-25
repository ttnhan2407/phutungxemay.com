<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

 	$Idkhachhang = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
       
        $UpdateCustomers = $kh->capnhat_thongtin($_POST, $Idkhachhang);
        
    }
?>
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
            	<form action="" method="post">
                <table class="table table-bordered text-center mb-0">
                		<?php
						if(isset($UpdateCustomers)){
							echo '<td colspan="3">'.$UpdateCustomers.'</td>';
						}
						?>  
                    <tbody class="align-middle">
                        <?php
                        $Idkhachhang = Session::get('customer_id');
                        $get_customers = $kh->thongtin_khachhang($Idkhachhang);
                        if($get_customers){
                            while($result = $get_customers->fetch_assoc()){

                        ?>
                        <tr class="bg-secondary text-dark">
                            
                            <th colspan="3">Customer Information</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                            	<input type="text" name="Tenkhachhang" value="<?php echo $result['Tenkhachhang'] ?>">
                            </td>
                          
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                            	<input type="text" name="Diachi" value="<?php echo $result['Diachi'] ?>">
                            </td>
                           
                           
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>
                            	<input type="text" name="Sophone" value="<?php echo $result['Sophone'] ?>">
                            </td>
                            
                           
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                            	<input type="text" name="Email" value="<?php echo $result['Email'] ?>">
                            </td>
                           
                        </tr>
                        <tr>
                            <td colspan="3">
                                
                               <input type="submit" name="save" value="Save Information">
                               
                            <td>
                            
                        </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>
    <!-- Cart End -->
<?php include 'inc/footer.php';?>
 