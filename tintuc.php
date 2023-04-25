<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>

<?php
    if(!isset($_GET['iddanhmuc']) || $_GET['iddanhmuc']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['iddanhmuc']; 
    }
?>
<!-- loại sản phẩm -->
        <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <?php
             $Ten_danhmuc = $tt->Tendanhmuc($id);
             if($Ten_danhmuc){
                while($result_dm = $Ten_danhmuc->fetch_assoc()){
            ?>
            <h2><?php echo $result_dm['Tieude'] ?></h2>
             <?php
            }
            }
            ?>
        </div>
       

        <div class="row px-xl-5 pb-3" style="justify-content: space-evenly;">
           <?php
             $show_tin_tuc = $tt->Show_tintuc($id);
             if($show_tin_tuc){
                while($result = $show_tin_tuc->fetch_assoc()){
            ?>
                
            
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" style="border: groove;">

                <div class="card product-item border-0 mb-4">
                

                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="Admin/hinhanh/<?php echo $result['Hinhanh'] ?>"  alt="">
                    </div>
                    
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 style="color: black;"><?php echo $result['Tentintuc'] ?></h6>
                        
                    </div>
                    <div class="card-footer d-flex justify-content-center border">
                        <a href="chitiet_tintuc.php?idtintuc=<?php echo $result['Idtintuc'] ?>" class="btn text-primary p-0"><i class="fas fa-eye text-primary mr-1"></i>Watch news</a>
                        
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
 