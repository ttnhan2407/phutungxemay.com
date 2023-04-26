<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php'; ?>
<?php
    $tt = new tintuc();
    if(!isset($_GET['id_danhmuc']) || $_GET['id_danhmuc']==NULL){
       echo "<script>window.location ='sua_dm_tintuc.php'</script>";
    }else{
         $id = $_GET['id_danhmuc']; 
    }
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $Tieude = $_POST['Tieude'];
        $Mota = $_POST['Mota'];
        $Tinhtrang = $_POST['Tinhtrang'];
        $capnhatloai = $tt->sua_dm_tintuc($Tieude,$Mota,$Tinhtrang,$id);
        
    }

?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit News Category</h6>
                            </div>
                             <?php
                            if(isset($capnhatloai)){
                                echo $capnhatloai;
                            }
                            ?>

                            <?php
                                $tendanhmuc = $tt->tintuc($id);
                                if($tendanhmuc){
                                    while($result = $tendanhmuc->fetch_assoc()){
                                   
                            ?>
                            <div class="card-body">
                                
                                <form style="color: black;" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>News Category Name</label>
                                    <input type="text" value="<?php echo $result['Tieude'] ?>" name="Tieude" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Describe</label>
                                    <input type="text" value="<?php echo $result['Mota'] ?>" name="Mota" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="Tinhtrang" class="form-control input-sm m-bot15">
                                        <?php
                                        if($result['Tinhtrang']==1){
                                        ?>
                                        <option selected value="1">Display</option>
                                        <option value="0">Hide</option> 
                                        <?php
                                    }else{
                                        ?>
                                        <option  value="1">Display</option>
                                        <option selected value="0">Hide</option>
                                        <?php
                                        }
                                        ?>                       
                                    </select>
                                </div>


                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                <a style="background: red" class="btn btn-info" href="Lietke_dm_tintuc.php">Cancel</a>
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