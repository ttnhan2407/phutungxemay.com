<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php'; ?>
<?php
    $tt = new tintuc();
     if(isset($_GET['xoadanhmuc'])){
        $id = $_GET['xoadanhmuc']; 
        $xoa_danhmuc = $tt->xoa_dm_tintuc($id);
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List News Category </h6>
                            </div>
                            
                            <div class="card-body">
                            <?php

                                    if(isset($xoa_danhmuc)){
                                        echo $xoa_danhmuc;
                                    }

                            ?>  
                            <table class="table table-hover table-bordered">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-1">No.</th>
                                            <th id="trs-hd-2" class="col-lg-2">Name Category</th>
                                            <th id="trs-hd-2" class="col-lg-2">Describe</th>
                                            <th id="trs-hd-2" class="col-lg-2">Status</th>
                                            <th id="trs-hd-7" class="col-lg-3">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $show_loaisp = $tt->lietke_danhmuc_tintuc();
                                            if($show_loaisp){
                                                $i = 0;
                                                while($result = $show_loaisp->fetch_assoc()){
                                                    $i++;
                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['Tieude'] ?></td>
                                            <td><?php echo $result['Mota'] ?></td>
                                            <td>
                                                <?php
                                                if($result['Tinhtrang']==1){
                                                ?>
                                                <a <?php echo $result['Tinhtrang'] ?>&Tinhtrang=0>Display</a> 
                                                <?php
                                                 }else{
                                                ?>  
                                                <a <?php echo $result['Tinhtrang'] ?>&Tinhtrang=1>Hide</a> 
                                                <?php
                                                }
                                                ?>
                                            </td>
                        
                                            <td>
                                                <a onclick = "return confirm('Want to delete?')" href="?xoadanhmuc=<?php echo $result['Iddanhmuc'] ?>" >
                                                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                </a>
          
                                                &middot;
                                                                                               
                                                <a href="sua_dm_tintuc.php?id_danhmuc=<?php echo $result['Iddanhmuc'] ?>">
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