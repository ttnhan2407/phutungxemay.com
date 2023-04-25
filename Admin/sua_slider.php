<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/slider.php' ?>
<?php
   $sliders = new slider();

    if(!isset($_GET['suaslider']) || $_GET['suaslider']==NULL){
       echo "<script>window.location ='sua_slider.php'</script>";
    }else{
         $id = $_GET['suaslider']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $capnhatslider = $sliders->sua_slider($_POST,$_FILES, $id);
        
    }
?> 
     

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Sliders</h6>
                            </div> 
                                                     
                            <div class="card-body">
                                <?php

                                    if(isset($capnhatslider)){
                                        echo $capnhatslider;
                                    }

                                    ?>        
                                <?php
                                     $get_slider_by_id = $sliders->getsliderbyid($id);
                                        if($get_slider_by_id){
                                            while($result = $get_slider_by_id->fetch_assoc()){
                                ?>     
                                 
                                
                                <form style="color: black;" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name Slide</label>
                                    <input type="text" name="Tenslider"  value="<?php echo  $result['Tenslider']?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label >Image</label>
                                    <img src="hinhanh/<?php echo $result['Anhslider'] ?>" width="90"><br>
                                    <input type="file" name="Anhslider" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label >Status</label>
                                    <select name="Trangthai" class="form-control input-sm m-bot15">
                                        <?php
                                        if($result['Trangthai']==1){
                                        ?>
                                        <option value="1">Display</option>
                                        <option value="0">Hide</option> 
                                        <?php
                                    }else{
                                        ?>
                                        <option value="1">Display</option>
                                        <option value="0">Hide</option>
                                        <?php
                                        }
                                        ?>                       
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info">Update</button>
                                 <a style="background: red" class="btn btn-info" href="lietke_slider.php">Cancel</a>
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