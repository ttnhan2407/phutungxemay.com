<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php';?>
<?php include '../classes/thuonghieu.php';?>
<?php include '../classes/sanpham.php';?>
<?php
    $SanPham = new sanpham();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $ThemSanpham = $SanPham->Them_sanpham($_POST,$_FILES);
        
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add Products</h6>
                            </div>
                            <?php

                                    if(isset($ThemSanpham)){
                                        echo $ThemSanpham;
                                    }

                            ?>     
                            <div class="card-body">            
                               <form role="form" action="them_sanpham.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Product's Name</label>
                                    <input type="text" name="Tensp" placeholder="Enter product name..." class="form-control ">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="Giaban" data-validation="number" placeholder="Enter price..."  data-validation-error-msg="Làm ơn điền số tiền"  class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Product Pictures</label>
                                    <input type="file" name="Anhsanpham" class="form-control">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="Mota" id="ckeditor1"></textarea>
                                </div>
                                <hr>
                                 <div class="form-group">
                                    <label>Product Contents</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="Noidung"  id="id4"></textarea>
                                </div>

                                 <div class="form-group">
                                    <label>Category Product</label>
                                    <select name="loaisanpham" id="select" class="form-control input-sm m-bot15">
                                        <?php
                                        $cat = new loaisanpham();
                                        $ds_loaisp = $cat->lietke_loaisp();

                                        if($ds_loaisp){
                                            while($result = $ds_loaisp->fetch_assoc()){
                                         ?>

                                        <option value="<?php echo $result['Idloai'] ?>"><?php echo $result['Tenloai'] ?></option>

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

                                        <option value="<?php echo $result['Idthuonghieu'] ?>"><?php echo $result['Tenthuonghieu']?></option>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Properties</label>
                                    <select name="Thuoctinh" id="select" class="form-control input-sm m-bot15">  
                                    <option value="1">Featured Products</option>
                                    <option value="0">Products Not Featured</option>
                                    </select>
                                </div>


                                <hr>
                               
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="lietke_sanpham.php">Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>