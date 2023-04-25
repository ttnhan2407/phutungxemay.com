<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php';?>

<?php
    $tt = new tintuc();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $Themtintuc = $tt->Them_tintuc($_POST,$_FILES);
        
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add News</h6>
                            </div>
                            <?php

                                    if(isset($Themtintuc)){
                                        echo $Themtintuc;
                                    }

                            ?>     
                            <div class="card-body">            
                               <form role="form" action="themtintuc.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="Tentintuc" placeholder="Enter title..." class="form-control ">
                                </div>

                                <div class="form-group">
                                    <label>News Images</label>
                                    <input type="file" name="Hinhanh" class="form-control">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Describe</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" id="a1" name="Mota" ></textarea>
                                </div>
                                <hr>
                                 <div class="form-group">
                                    <label>Content</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="Noidung" id="b2"></textarea>
                                </div>

                                 <div class="form-group">
                                    <label>News Category</label>
                                    <select name="Danhmuctintuc" id="select" class="form-control input-sm m-bot15"> 
                                    <?php
                                        $tt = new tintuc();
                                        $danhmuc_tintuc = $tt->lietke_danhmuc_tintuc();

                                        if($danhmuc_tintuc){
                                            while($result = $danhmuc_tintuc->fetch_assoc()){
                                         ?>

                                        <option value="<?php echo $result['Iddanhmuc'] ?>"><?php echo $result['Tieude'] ?></option>

                                           <?php
                                              }
                                          }
                                        ?>                                 
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="Trangthai" id="select" class="form-control input-sm m-bot15">  
                                        <option value="1">Display</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>


                                <hr>
                               
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="lietketintuc.php">Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>