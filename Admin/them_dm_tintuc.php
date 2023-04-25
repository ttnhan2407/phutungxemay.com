<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php'; ?>
<?php
    $tt = new tintuc();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Tieude = $_POST['Tieude'];
        $Mota = $_POST['Mota'];
        $Tinhtrang = $_POST['Tinhtrang'];
       
       
        $themdanhmuc = $tt->them_danhmuc_tintuc($Tieude,$Mota,$Tinhtrang);
        
    }
?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add News Category</h6>
                            </div>
                            <?php
                                    if(isset($themdanhmuc)){
                                        echo $themdanhmuc;
                                    }
                            ?>
                            <div class="card-body">
                                
                                <form style="color: black;" role="form" action="them_dm_tintuc.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name Category News</label>
                                    <input type="text" name="Tieude" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label>Describe</label>
                                    <input type="text" name="Mota" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="Tinhtrang" id="select" class="form-control input-sm m-bot15">  
                                    <option value="1">Display</option>
                                    <option value="0">Hide</option>
                                    </select>
                                </div>


                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="lietke_dm_tintuc.php">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>