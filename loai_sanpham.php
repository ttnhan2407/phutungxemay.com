<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>

<?php
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['catid']; 
    }
    
    
?>
<!-- loại sản phẩm -->
        <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <?php
             $name_cat = $lsp->get_name_by_cat($id);
             if($name_cat){
                while($result_name = $name_cat->fetch_assoc()){
            ?>
            <h2><?php echo $result_name['Tenloai'] ?></h2>
             <?php
            }
            }
            ?>
        </div>
       

        <div class="row px-xl-5 pb-3" style="justify-content: space-evenly;">
           <?php
             $productbycat = $lsp->Loaisanpham($id);
             if($productbycat){
                while($result = $productbycat->fetch_assoc()){
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
            echo 'This product type is not available';
        }
            ?>
            
        </div>
    </div>
    <!-- Products End -->
<?php include 'inc/footer.php';?>
 