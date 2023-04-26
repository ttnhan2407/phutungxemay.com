<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php'; ?>
<?php
    $cat = new loaisanpham();
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='sua_loaisp.php'</script>";
    }else{
         $id = $_GET['catid']; 
    }
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $Tenloai = $_POST['Tenloai'];
        $capnhatloai = $cat->sua_loaisp($Tenloai,$id);
        
    }

?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4" >
                            <div class="card-header" style="text-align: center;">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Product Category</h6>
                            </div>
                            <?php
                            if(isset($capnhatloai)){
                                echo $capnhatloai;
                            }
                            ?>

                            <?php
                                $tenloaisp = $cat->getcatbyId($id);
                                if($tenloaisp){
                                    while($result = $tenloaisp->fetch_assoc()){
                                   
                            ?>
                            <div class="card-body">
                            
                                
                                <form style="color: black;" role="form" action="" method="post" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Category</label>
                                    <input type="text" value="<?php echo $result['Tenloai'] ?>" name="Tenloai" class="form-control" id="exampleInputEmail1">
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                 <a style="background: red" class="btn btn-info" href="Lietke_loaisp.php">Cancel</a>
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