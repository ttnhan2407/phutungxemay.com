<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/thuonghieu.php' ?>
<?php
    $brand = new thuonghieu();
      if(isset($_GET['xoathuonghieu'])){
         $id = $_GET['xoathuonghieu']; 
         $delete_brand = $brand->xoa_thuonghieu($id);
    }
?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List Brand</h6>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <?php

                                if(isset($delete_brand)){
                                    echo $delete_brand;
                                }

                                ?>   
                                    <table class="table table-hover table-bordered">
                                        <thead class="bill-header cs">
                                            <tr>
                                                <th id="trs-hd-1" class="col-lg-1">No.</th>
                                                <th id="trs-hd-2" class="col-lg-2">Name Brand</th>
                                                <th id="trs-hd-7" class="col-lg-3">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $show_brand = $brand->lietke_thuonghieusp();
                                                if($show_brand){
                                                    $i = 0;
                                                    while($result = $show_brand->fetch_assoc()){
                                                        $i++;
                                                    
                                            ?>

                                            <tr>
                                        
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['Tenthuonghieu'] ?></td>
                                                <td>
                                                    <a onclick = "return confirm('Want to delete?')" href="?xoathuonghieu=<?php echo $result['Idthuonghieu'] ?>" >
                                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                    </a>
              
                                                    &middot;
                                                                                                   
                                                    <a href="sua_thuonghieu.php?brandid=<?php echo $result['Idthuonghieu'] ?>">
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