 
<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<?php
    $login_check = Session::get('customer_login'); 
    if($login_check==false){
         echo "<script> window.location ='login.php'</script>";
    }
    
?> 
<?php
    if(isset($_GET['confirmid'])){
        $Iddathang = $_GET['confirmid'];
        $thoigian = $_GET['thoigian'];
        $Giaban = $_GET['Giaban'];
        $shifted_confirm = $gh->shifted_confirm($Iddathang,$thoigian,$Giaban);
    }
?>
 <!-- đơn hàng -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        
                        <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Booking Date</th>
                            <th>Order Status</th>
                            <th>Status</th>
                        </tr>
                        
                    </thead>
                    <?php
                            $Idkhachhang = Session::get('customer_id');
                            $get_cart_ordered = $gh->tinhtrang_donhang($Idkhachhang);
                            if($get_cart_ordered){
                                $i = 0;
                                $qty = 0;
                                $total = 0;
                                while($result = $get_cart_ordered->fetch_assoc()){
                                    $i++;
                                    $total = $result['Giaban']*$result['Soluong'];
                    ?>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle">
                                <?php echo $i; ?>
                            </td>

                            <td class="align-middle">
                                <?php echo $result['Tensp'] ?>
                            </td>

                            <td class="align-middle">
                                <img width="80" src="Admin/hinhanh/<?php echo $result['Anhsanpham'] ?>" alt=""/>
                            </td>

                            <td class="align-middle">
                                <?php echo $fm->format_currency($result['Giaban'])." "."VNĐ" ?>
                            </td>

                            <td class="align-middle">
                                <?php echo $result['Soluong'] ?>
                            </td>

                            <td class="align-middle">
                                <?php echo $fm->formatDate($result['Ngaymua']) ?>
                            </td>

                            <td class="align-middle">
                                <?php
                                    if($result['Tinhtrang']=='0'){
                                        echo 'Orders are being processed';
                                    }elseif($result['Tinhtrang']==1){ 
                                    ?>
                                    <span>Orders are being delivered</span>
                                    
                                    <?php
                                    }elseif($result['Tinhtrang']==2){
                                        echo 'The order has been delivered';
                                    }

                                ?>
                            </td>
                            <?php
                                if($result['Tinhtrang']=='0'){
                                ?>
                                <td class="align-middle"><?php echo 'N/A';?></td>
                                <?php
                                
                                }elseif($result['Tinhtrang']=='1'){
                                
                                ?>
                                <td class="align-middle"><a href="?confirmid=<?php echo $Idkhachhang ?>&Giaban=<?php echo $result['Giaban'] ?>&thoigian=<?php echo $result['Ngaymua'] ?>">Receive</a></td>
                                <?php
                                }else{
                                ?>
                                <td class="align-middle"><?php echo 'Received'; ?></td>
                                <?php
                                }   
                                ?>

                        </tr>
                    </tbody>
                        <?php
                            
                            }
                        }
                        ?>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->
<?php include 'inc/footer.php';?>