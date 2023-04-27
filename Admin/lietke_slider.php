<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/slider.php';?>
<?php
    $sliders = new slider();
    if(isset($_GET['trangthai_slider']) && isset($_GET['Trangthai'])){
        $id = $_GET['trangthai_slider'];
        $Trangthai = $_GET['Trangthai'];
        $update_type_slider = $sliders->Capnhat_Trangthai_slider($id,$Trangthai);

    }
    if(isset($_GET['xoaslider'])){
        $id = $_GET['xoaslider'];
        
        $delete_slider = $sliders->xoa_slider($id);
    }

?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List Sliders</h6>
                            </div>
                            <div class="card-body" style="text-align: center;">
                            <?php
                            if(isset($delete_slider)){
                                echo $delete_slider;
                            }
                            ?> 
                                <table class="table table-hover table-bordered">
                                <thead class="bill-header cs">
                                    <tr>
                                        <th id="trs-hd-1" class="col-lg-1">No.</th>
                                        <th id="trs-hd-2" class="col-lg-2">Name Slider</th>
                                        <th id="trs-hd-3" class="col-lg-3">Image</th>
                                        <th id="trs-hd-7" class="col-lg-3">Status</th>
                                        <th id="trs-hd-4" class="col-lg-2">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $slider = new slider();
                                        $get_slider = $slider->danhsach_slider();
                                        if($get_slider){
                                            $i = 0;
                                            while($result_slider = $get_slider->fetch_assoc()){
                                                $i++;
                                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_slider['Tenslider'] ?></td>
                                        <td><img src="hinhanh/<?php echo $result_slider['Anhslider'] ?>" height="120px" width="500px"/></td>
                                        <td>
                                            <?php
                                            if($result_slider['Trangthai']==1){
                                            ?>
                                            <a href="?trangthai_slider=<?php echo $result_slider['Idslider'] ?> &Trangthai=0">
                                             <i class="fas fa-thumbs-up" style="font-size: 15px; "></i> 
                                            </a>
                                            <?php
                                             }else{
                                            ?>  
                                            <a href="?trangthai_slider=<?php echo $result_slider['Idslider'] ?> &Trangthai=1">
                                            <i class="fas fa-thumbs-down" style="font-size: 15px; color: red;"></i>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <a onclick = "return confirm('Want to delete?')" href="?xoaslider=<?php echo $result_slider['Idslider'] ?>" >
                                                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                                            </a>

                                             &middot;
                                                                                               
                                                <a href="sua_slider.php?suaslider=<?php echo $result_slider['Idslider'] ?>">
                                                    <i  class="far fa-edit" style="font-size: 15px;"></i>
                                               </a>
                                        </td>
                                    </tr>
                                        <?php
                                    }
                                        }
                                        ?>    
                                    
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>