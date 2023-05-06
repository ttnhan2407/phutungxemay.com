<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>

<?php

    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $Idkhachhang = Session::get('customer_id');
       $insertOrder = $gh->dat_hang($Idkhachhang);
        $delCart = $gh->xoa_dulieu_giohang();
        echo "<script> window.location ='muahang_thanhcongoff.php'</script>";
    }
 
?>
<div class="container-fluid pt-5">
        <form action="" method="POST">
         <div class="main">
            <div class="content">
                <div class="section group text-center">
                    <h2 class="success_order">Successful Purchase</h2>
                    <?php
                     $Idkhachhang = Session::get('customer_id');
                     $get_amount = $gh->so_tien($Idkhachhang);
                     if($get_amount){
                        $amount = 0;
                        while($result = $get_amount->fetch_assoc()){
                            $Giaban = $result['Giaban'];
                            $amount += $Giaban; 

                        }
                     }
                    ?>
                    <p class="success_note">
                    Total price that you bought the product from the website:
                    <?php

                    $vat = $amount * 0.1;
                    $total = $vat + $amount;
                    echo $fm->format_currency($total). ' VNĐ';
                    ?> 

                    </p>
                    <p class="success_note">Contact us as soon as possible. Please see your order details. <a href="chitiet_donhang.php">Here</a></p>
                </div>

            </div>

         </div>
        </form>
</div>
<?php include 'inc/footer.php';?>
 