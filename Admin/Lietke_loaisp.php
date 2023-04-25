<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php'; ?>

<?php
    $cat = new loaisanpham();
     if(isset($_GET['xoaloaisp'])){
        $id = $_GET['xoaloaisp']; 
        $xoaloaisanpham = $cat->xoa_loaisp($id);
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List Product Category</h6>
                            </div>
                            
                            <div class="card-body">
                             <?php

                                    if(isset($xoaloaisanpham)){
                                        echo $xoaloaisanpham;
                                    }

                            ?>  

                            <table class="table table-hover table-bordered">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-1">No.</th>
                                            <th id="trs-hd-2" class="col-lg-2">Name Category</th>
                                            <th id="trs-hd-7" class="col-lg-3">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $show_loaisp = $cat->lietke_loaisp();
                                            if($show_loaisp){
                                                $i = 0;
                                                while($result = $show_loaisp->fetch_assoc()){
                                                    $i++;
                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['Tenloai'] ?></td>
                                            <td>
                                                <a onclick = "return confirm('Want to delete?')" href="?xoaloaisp=<?php echo $result['Idloai'] ?>" >
                                                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                </a>
          
                                                &middot;
                                                                                               
                                                <a href="sua_loaisp.php?catid=<?php echo $result['Idloai'] ?>">
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