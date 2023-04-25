<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/slider.php' ?>
<?php
    $sliders = new slider();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
         
        $ThemSlider = $sliders->them_slider($_POST, $_FILES);
        
    }
?> 
     

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Add Sliders</h6>
                            </div> 
                                                     
                            <div class="card-body">
                                <?php
                                    if(isset($ThemSlider)){
                                        echo $ThemSlider;
                                    }
                                ?>    
                                
                                <form style="color: black;" role="form" action="them_slider.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name Slide</label>
                                    <input type="text" name="Tenslider" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="Anhslider" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Status</label>
                                    <select name="Trangthai" class="form-control input-sm m-bot15">
                                            <option value="1">Display</option>
                                            <option value="0">Hide</option>
                                            
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">ADD</button>
                                <a style="background: red" class="btn btn-info" href="lietke_slider.php">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>