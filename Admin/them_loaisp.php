<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php'; ?>
<?php
    $cat = new loaisanpham();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Tenloai = $_POST['Tenloai'];
        $insertCat = $cat->them_loaisp($Tenloai);
    }
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add Product Category</h6>
                            </div>
                            <?php
                                    if(isset($insertCat)){
                                        echo $insertCat;
                                    }
                            ?>
                            <div class="card-body">
                                <form style="color: black;" role="form" action="them_loaisp.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Category</label>
                                    <input type="text" name="Tenloai" class="form-control" id="exampleInputEmail1">
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="Lietke_loaisp.php">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>