<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<?php
    $login_check = Session::get('customer_login'); 
    if($login_check==false){
         echo "<script> window.location ='login.php'</script>";
    }
    
?> 
<?php

    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $Idkhachhang = Session::get('customer_id');
       $insertOrder = $gh->dat_hang($Idkhachhang);
       $insertOrder = $gh->dat_hangonline($Idkhachhang);
        $delCart = $gh->xoa_dulieu_giohang();
        echo "<script> window.location ='muahang_thanhcong.php'</script>";
    }
 
?>
<!-- Checkout Start -->
<form action="vnpay.php" method="POST">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-4">
                <div class="mb-5">
                    <h4 class="font-weight-semi-bold mb-4">Customer Information</h4>
                    <div class="row">
                        <?php
                        $Idkhachhang = Session::get('customer_id');
                        $get_customers = $kh->thongtin_khachhang($Idkhachhang);
                        if($get_customers){
                            while($result = $get_customers->fetch_assoc()){

                        ?>
                        <div class="col-md-6 form-group">
                            <label>Customer Name</label>
                            <input class="form-control" type="text" name="Tenkhachhang" value="<?php echo $result['Tenkhachhang'] ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="Diachi" value="<?php echo $result['Diachi'] ?>">
                        </div>
                        <div  class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="Email" value="<?php echo $result['Email'] ?>">
                        </div>
                        <div  class="col-md-6 form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="Sophone" value="<?php echo $result['Sophone'] ?>">
                        </div>
                        <div  class="col-md-12 form-group">
                                <a class="btn btn-primary px-3" style="border: groove;" href="capnhat_thongtin.php">Update information</a>
                        </div>
                        
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Bill</h4>
                    </div>
                    
                    <div class="card-body">
                       <?php
                             if(isset($delcart)){
                                echo $delcart;
                             }
                            ?>
                        <div class="d-flex justify-content-between">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th >Product</th>
                                        <th >Price</th>
                                        <th >Quantity</th>
                                        <th >Total</th>
                                        
                                    </tr>
                                </thead>
                             <?php
                            $get_product_cart = $gh->sanpham_giohang();
                            if($get_product_cart){
                                $subtotal = 0;
                                $qty = 0;
                                while($result = $get_product_cart->fetch_assoc()){
                             ?>
                            
                            <tr>
                                <td><?php echo $fm->textShorten($result['Tensp'], 20) ?></td>
                                <td><?php echo $fm->format_currency($result['Giaban'])." "."VNĐ" ?></td>
                                <td><?php echo $result['Soluong'] ?></td>
                                <td>
                                    <?php
                                    $total = $result['Giaban'] * $result['Soluong'];
                                    echo $fm->format_currency($total).' '.'VNĐ' ;
                                     ?>         
                                </td>
                            </tr>
                             <?php
                            $subtotal += $total;
                            $qty = $qty + $result['Soluong'];
                                }
                            }
                            ?>
                            </table>
                           
                            
                           
                        </div>
                        
                        <hr class="mt-0">
                        <?php
                        $check_cart = $gh->kiemtra_giohang();
                            if($check_cart){
                        ?>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Amount of money</h6>
                            <h6 class="font-weight-medium">
                                <?php 

                                    echo $fm->format_currency($subtotal)." "."VNĐ";
                                    Session::set('sum',$subtotal);
                                    Session::set('qty',$qty);
                                ?>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">VAT</h6>
                            <h6 class="font-weight-medium">10%</h6>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total money</h5>
                                <h5 class="font-weight-bold">
                                <?php 

                                $vat = $subtotal * 0.1;
                                $gtotal = $subtotal + $vat;
                                echo $fm->format_currency($gtotal)." "."VNĐ";
                                ?>
                                    
                                </h5>
                            </div>
                        </div>
                        <?php
                        }else{
                            echo 'Cart is empty, please add products to cart!';
                        }
                        ?>
                    </div>
                    
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Payment on delivery</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <center>
                            <a  class="btn btn-primary px-3" style="border: groove;" href="?orderid=order">Order</a>
                        </center>
                
                    </div>

                    <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment Methods</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">ATM</label>
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <center>
                            <input type="hidden" name="total_paymentgateways" value="<?php echo $gtotal ?>"></input>
                            <button onclick="window.location='?orderid=order'" class="btn btn-primary px-3" name="payment" id="paypal">Payment with VNPAY</button>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Checkout End -->
    <?php include 'inc/footer.php';?>