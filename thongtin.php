<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>

<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">  
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
                            <td><?php echo $result['Tenkhachhang'] ?></td>
                          
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $result['Diachi'] ?></td>
                           
                           
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $result['Sophone'] ?></td>
                            
                           
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $result['Email'] ?></td>
                           
                        </tr>
                        <tr>
                            <td colspan="3">
                                
                                <a class="btn btn-primary px-3" style="border: groove;" href="capnhat_thongtin.php">Update Information</a>
                               
                            <td>
                            
                        </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
<?php include 'inc/footer.php';?>
 