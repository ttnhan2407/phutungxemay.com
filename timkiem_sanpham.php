<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<!--  sản phẩm nổi bật -->
    <div class="container-fluid pt-5">
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $tukhoa = $_POST['tukhoa'];
                    $search_product = $sp->timkiem_sanpham($tukhoa);
                    
                }
            ?>
        <div class="text-center mb-4">
            <h2>Search keywords:.......... <?php echo $tukhoa ?></h2>
        </div>

        <div class="row px-xl-5 pb-3" style="justify-content: space-evenly;">   
            <?php
            
             if($search_product){
                while($result = $search_product->fetch_assoc()){
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" style="border: groove;">

                <div class="card product-item border-0 mb-4">
                

                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="Admin/hinhanh/<?php echo $result['Anhsanpham'] ?>"  alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $result['Tensp'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?php echo $fm->format_currency($result['Giaban'], 50)." "."VNĐ" ?></h6><h6 class="text-muted ml-2"></h6>

                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center border">
                        <a href="chitiet_sanpham.php?proid=<?php echo $result['Idsanpham'] ?>" class="btn text-primary p-0"><i class="fas fa-eye text-primary mr-1"></i>Detail</a>
                        
                    </div> 
              
                                
                </div>
                      
            
            </div>
            <?php
            }

            }else{
                echo 'There are no products to search for';
            }
            ?>
        </div>
        
    </div>
    <!-- Products End -->
<?php include 'inc/footer.php';?>
 