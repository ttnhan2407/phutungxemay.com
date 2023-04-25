<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php';?>
<?php include '../classes/thuonghieu.php';?>
<?php include '../classes/sanpham.php';?>
<?php
    $SanPham = new sanpham();

    if(!isset($_GET['capnhat_sanpham']) || $_GET['capnhat_sanpham']==NULL){
       echo "<script>window.location ='lietke_sanpham.php'</script>";
    }else{
         $id = $_GET['capnhat_sanpham']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $Capnhatsp = $SanPham->Cap_nhat_sp($_POST,$_FILES, $id);
        
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                            </div>
                            <?php

                                    if(isset($Capnhatsp)){
                                        echo $Capnhatsp;
                                    }

                                ?>        
                            <?php
                            $get_product_by_id = $SanPham->getproductbyId($id);
                                if($get_product_by_id){
                                    while($result_product = $get_product_by_id->fetch_assoc()){
                            ?>      
                            <div class="card-body">            
                               <form role="form" action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Product's Name</label>
                                    <input type="text" name="Tensp" value="<?php echo  $result_product['Tensp']?>" class="form-control ">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="Giaban" data-validation="number" value="<?php echo  $result_product['Giaban']?>" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Product Pictures</label>
                                    <img src="hinhanh/<?php echo $result_product['Anhsanpham'] ?>" width="80"><br>
                                    <input type="file" name="Anhsanpham" class="form-control">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="Mota" id="ckeditor1"><?php echo $result_product['Mota'] ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Product Contents</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="Noidung"  id="id4"><?php echo $result_product['Noidung'] ?>
                                    </textarea>
                                </div>

                                 <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="loaisanpham" id="select" class="form-control input-sm m-bot15">
                                        <?php
                                        $cat = new loaisanpham();
                                        $ds_loaisp = $cat->lietke_loaisp();

                                        if($ds_loaisp){
                                            while($result = $ds_loaisp->fetch_assoc()){
                                         ?>

                                        <option 
                                        <?php
                                        if($result['Idloai']==$result_product['Idloaisp']){ echo 'selected';  }
                                        ?>
                                        value="<?php echo $result['Idloai'] ?>"><?php echo $result['Tenloai'] ?></option>

                                           <?php
                                              }
                                          }
                                        ?>                                      
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label>Brand</label>
                                      <select id="select" name="thuonghieu" class="form-control input-sm m-bot15">
                                        <?php
                                        $brand = new thuonghieu();
                                        $ds_thuonghieusp = $brand->lietke_thuonghieusp();

                                        if($ds_thuonghieusp){
                                            while($result = $ds_thuonghieusp->fetch_assoc()){
                                         ?>

                                        <option
                                        <?php
                                        if($result['Idthuonghieu']==$result_product['Idthuonghieusp']){ echo 'selected';  }
                                        ?>

                                         value="<?php echo $result['Idthuonghieu'] ?>"><?php echo $result['Tenthuonghieu']?></option>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Properties</label>
                                    <select id="select" name="Thuoctinh" class="form-control input-sm m-bot15">
                                    <?php
                                    if($result_product['Thuoctinh']==1){
                                    ?>
                                    <option selected value="1">Featured Products</option>
                                    <option value="0">Product Not Featured</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="1">Featured Products</option>
                                    <option selected value="0">Product Not Featured</option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>

                                <hr>
                               
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                 <a style="background: red" class="btn btn-info" href="lietke_sanpham.php">Cancel</a>
                                </form>
                                <?php
                            }

                            }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>