<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php';?>

<?php
    $tt = new tintuc();

    if(!isset($_GET['suatintuc']) || $_GET['suatintuc']==NULL){
       echo "<script>window.location ='lietketintuc.php'</script>";
    }else{
         $id = $_GET['suatintuc']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $capnhat_tintuc = $tt->sua_tintuc($_POST,$_FILES, $id);
        
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                         
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit New</h6>
                            </div>
                             
                            <?php

                                    if(isset($capnhat_tintuc)){
                                        echo $capnhat_tintuc;
                                    }

                                ?> 

                            <?php
                            $show_tin_tuc = $tt->lietketintuc($id);
                                if($show_tin_tuc){
                                    while($result_tintuc = $show_tin_tuc->fetch_assoc()){
                            ?>         
                              
                            <div class="card-body"> 
                                       
                               <form role="form" action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="Tentintuc" value="<?php echo  $result_tintuc['Tentintuc']?>" class="form-control ">
                                </div>


                                <div class="form-group">
                                    <label>Image</label>
                                    <img src="hinhanh/<?php echo $result_tintuc['Hinhanh'] ?>" width="80"><br>
                                    <input type="file" name="Hinhanh" class="form-control">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Describe</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="Mota" id="a1"><?php echo $result_tintuc['Mota'] ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="Noidung"  id="b2"><?php echo $result_tintuc['Noidung'] ?>
                                    </textarea>
                                </div>

                                 <div class="form-group">
                                    <label>News Category</label>
                                    <select name="Tieude" id="select" class="form-control input-sm m-bot15">
                                        <?php
                                        $tt = new tintuc();
                                        $ds_loaisp = $tt->lietke_danhmuc_tintuc();

                                        if($ds_loaisp){
                                            while($result = $ds_loaisp->fetch_assoc()){
                                        ?>

                                        <option 
                                        <?php
                                        if($result['Iddanhmuc']==$result_tintuc['Danhmuctintuc']){ echo 'selected';  }
                                        ?>
                                        value="<?php echo $result['Iddanhmuc'] ?>"><?php echo $result['Tieude'] ?></option>

                                           <?php
                                              }
                                          }
                                        ?>                                      
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="select" name="Trangthai" class="form-control input-sm m-bot15">
                                    <?php
                                    if($result_tintuc['Trangthai']==1){
                                    ?>
                                    <option selected value="1">Display</option>
                                    <option value="0">Hide</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="1">Display</option>
                                    <option selected value="0">Hide</option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>

                                <hr>
                               
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                 <a style="background: red" class="btn btn-info" href="lietketintuc.php">Cancel</a>
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