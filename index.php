<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>



   
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3 "style="justify-content: center;">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Supporth</h5>
                </div>
            </div>
        </div>
    </div>
   

  
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Featured Products</span></h2>
        </div>

        <div class="row px-xl-5 pb-3" style="justify-content: space-evenly;">
            <?php
                $sanpham_noibat = $sp->sanphamnoibat();
                    if($sanpham_noibat){
                        while($result = $sanpham_noibat->fetch_assoc()){

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
                    <div class="border-gr card-footer d-flex justify-content-center  border">
                    <a href="chitiet_sanpham.php?proid=<?php echo $result['Idsanpham'] ?>" class=" btn text-primary  p-0"><i class="fas fa-eye text-primary mr-1"></i>Detail</a>     
                        
                    </div> 
                     
                                
                </div>

            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    

   

    <!--  sản phẩm moi -->
        <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">New Product</span></h2>
        </div>

        <div class="row px-xl-5 pb-3" style="justify-content: space-evenly;">
            <?php
                        $sanpham_moi = $sp->sanphammoi();
                        if($sanpham_moi){
                            while($result_moi = $sanpham_moi->fetch_assoc()){

            ?>
                
            
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" style="border: groove;" >

                <div class="card product-item border-0 mb-4">
                

                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="Admin/hinhanh/<?php echo $result_moi['Anhsanpham'] ?>"  alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $result_moi['Tensp'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?php echo $fm->format_currency($result_moi['Giaban'], 50)." "."VNĐ" ?></h6><h6 class="text-muted ml-2"></h6>

                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center border">
                        <a href="chitiet_sanpham.php?proid=<?php echo $result_moi['Idsanpham'] ?>" class="btn text-primary p-0"><i class="fas fa-eye text-primary mr-1"></i>Detail</a>
                    </div> 
              
                                
                </div>
                      
            
            </div>
            <?php
                }
            }
            ?>
            
        </div>
    </div>


                <style>
                .center {
                  text-align: center;
                }

                .pagination {
                  display: inline-block;
                }

                .pagination a {
                  color: black;
                  float: left;
                  padding: 8px 16px;
                  text-decoration: none;
                  transition: background-color .3s;
                  border: 1px solid #ddd;
                  margin: 0 4px;
                }

                .pagination a.active {
                  background-color: #4CAF50;
                  color: white;
                  border: 1px solid #4CAF50;
                }

                .pagination a:hover:not(.active) {background-color: #0f7a06;}
                </style>

                <!-- phan trang -->
             <div class="center">
              <div class="pagination">
                <?php
                        $tatca_sanpham = $sp->sanpham();
                        $sanpham_count = mysqli_num_rows($tatca_sanpham);
                        $sanpham_button = ceil($sanpham_count/4);
                        $i = 1;
                        echo '<div class="col-12 pb-1"></div>';
                        for($i=1;$i<=$sanpham_button;$i++){
                            echo ' <a href="index.php?trang='.$i.'">'.$i.'</a> ';

                        } 
                ?>
              
              </div>
            </div> 


<?php include 'inc/footer.php';?>
 