<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>


<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $gh->xoa_sp_giohang($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $Idgiohang = $_POST['Idgiohang'];
        $Soluong = $_POST['Soluong'];
        $Capnhat_sp_giohang = $gh->capnhat_sp_giohanng($Soluong, $Idgiohang);
        if($Soluong<=0){
            $delcart = $gh->xoa_sp_giohang($Idgiohang);
        }
    }
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0; URL=?id=live'>";

    }
?>

    <!-- giỏ hàng -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <?php
                     if(isset($Capnhat_sp_giohang)){
                        echo $Capnhat_sp_giohang;
                     }
                    ?>
                    <?php
                     if(isset($delcart)){
                        echo $delcart;
                     }
                    ?>
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                        
                    </thead>
                    <?php
                            $get_product_cart = $gh->sanpham_giohang();
                            if($get_product_cart){
                                $subtotal = 0;
                                $qty = 0;
                                while($result = $get_product_cart->fetch_assoc()){
                             ?>
                    <tbody class="align-middle">
                        
                        <tr>
                            <td class="align-middle"><?php echo $fm->textShorten($result['Tensp'], 15) ?></td>
                            <td><img width="80" src="admin/hinhanh/<?php echo $result['Anhsanpham'] ?>" alt=""/></td>
                            <td class="align-middle"><?php echo $fm->format_currency($result['Giaban'])." "."VNĐ" ?></td>
                            <td class="align-middle">
                            <form action="" method="post">
                                <input type="hidden" name="Idgiohang" value="<?php echo $result['Idgiohang'] ?>"/>
                                <input style="max-width: 85px;" type="number" name="Soluong" min="0"  value="<?php echo $result['Soluong'] ?>"/>
                                <button class="bg-success text-white" type="submit" name="submit">Update</button>
                            </form>
                            </td>
                            <td class="align-middle">
                                <?php
                                $total = $result['Giaban'] * $result['Soluong'];
                                echo $fm->format_currency($total)." "."VNĐ";
                                 ?>
                                     
                            </td>
                            <td class="align-middle"><a onclick = "return confirm('Do you want to delete the product?')" href="?cartid=<?php echo $result['Idgiohang'] ?>" >
                            <i class="fa fa-trash text-danger" style="font-size: 15px;"></i>
                            </a>
                            </td>
                          
                        </tr>
                        
                    </tbody>
                      <?php
                            $subtotal += $total;
                            $qty = $qty + $result['Soluong'];
                            }
                        }
                        ?>
                </table>
               
                
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                     <?php
                    $check_cart = $gh->kiemtra_giohang();
                        if($check_cart){
                    ?>
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Bill</h4>
                    </div>
                    <div class="card-body">
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
                        <a class="btn btn-block btn-primary my-3 py-3" style="border: groove;" href="thanhtoan.php">Pay</a>
                    </div>
                    <?php
                    }else{
                        echo 'Cart is empty, please add products to cart!';
                    }
                      ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php 
    include 'inc/footer.php';
    
 ?>