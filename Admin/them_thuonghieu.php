<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/thuonghieu.php'; ?>
<?php
    $brand = new thuonghieu();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Tenthuonghieu = $_POST['Tenthuonghieu'];
        $Tenthuonghieu = $brand->them_thuonghieusp($Tenthuonghieu);
        
    }
?>      

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add Brand</h6>
                            </div>
                            <?php
                                if(isset($Tenthuonghieu)){
                                echo $Tenthuonghieu;
                                }
                            ?> 
                            <div class="card-body">
                                <form style="color: black;" role="form" action="them_thuonghieu.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Name Brand</label>
                                    <input type="text" name="Tenthuonghieu" class="form-control" id="">
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="lietke_thuonghieu.php">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>