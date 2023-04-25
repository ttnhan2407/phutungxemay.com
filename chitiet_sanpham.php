<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<?php

    if(!isset($_GET['proid']) || $_GET['proid']==NULL){
    }else{
        $id = $_GET['proid']; 
    }
    $Idkhachhang = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['yeuthich'])) {

        $idsanpham = $_POST['idsanpham'];
        $them_sp_yeuthich = $sp->them_yeuthich($idsanpham, $Idkhachhang);
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $Soluong = $_POST['Soluong'];
        $insertCart = $gh->them_sp_giohang($Soluong, $id);
        
    }
?>
    <!-- chi tiết ản phẩm -->
    <div class="container-fluid py-5">
        <?php

        $chi_tiet_san_pham = $sp->chitietsanpham($id);
        if($chi_tiet_san_pham){
            while($result_chitiet = $chi_tiet_san_pham->fetch_assoc()){
        

        ?>
        <div class="row px-xl-5">    
        
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div  class="carousel-item active">
                            <img style="border: groove; margin-left: 280px;" class="w-50 h-50" src="Admin/hinhanh/<?php echo $result_chitiet['Anhsanpham'] ?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h6 class="font-weight-semi-bold"><?php echo $result_chitiet['Tensp'] ?></h6>
                <h6 style="color: red;" class="font-weight-semi-bold mb-4"><?php echo $fm->format_currency($result_chitiet['Giaban'])." "."VNĐ" ?></h6>
                <p style="margin-top: -20px;" class="mb-4"><?php echo $result_chitiet['Mota'] ?></p>
                <h6>Type: <?php echo $result_chitiet['Tenloai'] ?></h6>
                <h6>Brand: <?php echo $result_chitiet['Tenthuonghieu'] ?></h6>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    <form action="" method="post">
                    <input style="max-width: 94px; max-height: 30px;" type="number" class="buyfield" name="Soluong" value="1" min="1"/>
                    <button style="margin-left: 18px;" type="submit" name="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Add to Basket</button>
                    </form>
                    <?php
                        if(isset($insertCart)){
                            echo $insertCart;
                        }
                    ?>  
                </div>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <form action="" method="post">

                    <input type="hidden" name="idsanpham" value="<?php echo $result_chitiet['Idsanpham'] ?>"/>

                    <button type="submit" name="yeuthich" class="btn btn-primary px-3"><i class="fas fa-heart mr-1"></i>Favorite product</button>
                    <style>
    
                    .error {
                        padding-left: 35px;
                    }
                    .success{
                        padding-left: 35px;
                    }
                    </style>
                    </form>
                    <?php
                        if(isset($them_sp_yeuthich)){
                            echo $them_sp_yeuthich;
                        }
                        ?>
                </div>

            </div>
            
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <h4 class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Content</h4>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        
                        <p><?php echo $result_chitiet['Noidung'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>

<?php include 'inc/footer.php';?>
 