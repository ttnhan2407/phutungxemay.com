<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/thuonghieu.php'; ?>
<?php
   $brand = new thuonghieu();
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
       echo "<script>window.location ='sua_thuonghieu.php'</script>";
    }else{
         $id = $_GET['brandid']; 
    }
     $brand = new thuonghieu();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $Tenthuonghieu = $_POST['Tenthuonghieu'];
        $capnhatthuonghieu = $brand->sua_thuonghieu($Tenthuonghieu,$id);
        
    }

?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Brand</h6>
                            </div>
                            <?php
                                if(isset($capnhatthuonghieu)){
                                    echo $capnhatthuonghieu;
                                }
                                ?>
                                <?php
                                    $get_brand_name = $brand->getbrandbyId($id);
                                    if($get_brand_name){
                                        while($result = $get_brand_name->fetch_assoc()){
                                       
                            ?>
                            <div class="card-body">
                                <form style="color: black;" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Brand</label>
                                    <input type="text" value="<?php echo $result['Tenthuonghieu'] ?>" name="Tenthuonghieu" class="form-control" id="exampleInputEmail1">
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                 <a style="background: red" class="btn btn-info" href="Lietke_thuonghieu.php">Cancel</a>
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