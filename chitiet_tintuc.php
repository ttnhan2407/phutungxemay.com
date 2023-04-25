<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>


<?php
    if(!isset($_GET['idtintuc']) || $_GET['idtintuc']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['idtintuc']; 
    }
    
    
?>
<!-- loại sản phẩm -->
        <div class="col-md-12">
            

            <div class="col-md-12" style="justify-content: space-evenly;">
               <?php
                 $show_tin_tuc = $tt->chitiettintuc($id);
                 if($show_tin_tuc){
                    while($result = $show_tin_tuc->fetch_assoc()){
                ?>
                <div class="text-center">
                    <h2><?php echo $result['Tieude'] ?></h2>
                </div>
                
                <div class="col-md-12" style="border: groove;">

                    <div class="card product-item border-0 mb-4">
                    
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h2 style="color: red;" class="text-truncate mb-3"><?php echo $result['Tentintuc'] ?></h2>
                            <h6 style="color: red;" class="text-truncate mb-3"><?php echo $result['Mota'] ?></h6>
                            <div class="d-flex ">
                                
                                <h6><?php echo $result['Noidung'] ?></h6><h6 class="text-muted ml-2"></h6>

                            </div>
                        </div>
                  
                                    
                    </div>
                          
                
                </div>
                    <?php
                }

            }else{
                echo 'There is currently no news in this category';
            }
                ?>
                
            </div>
    </div>
    <!-- Products End -->
<?php include 'inc/footer.php';?>
 
