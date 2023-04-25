<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/tintuc.php'; ?>
<?php
    $tt = new tintuc();
     if(isset($_GET['xoatintuc'])){
        $id = $_GET['xoatintuc']; 
        $Xoa_tin_tuc = $tt->xoa_tintuc($id);
    }
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List News</h6>
                            </div>
                            
                            <div class="card-body">
                            <?php

                                    if(isset($Xoa_tin_tuc)){
                                        echo $Xoa_tin_tuc;
                                    }

                            ?>  
                            <table class="table table-hover table-bordered">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-1">No.</th>
                                            <th id="trs-hd-2" class="col-lg-2">Name News</th>
                                            <th id="trs-hd-2" class="col-lg-2">Image</th>
                                            <th id="trs-hd-2" class="col-lg-2">Describe</th>
                                            <th id="trs-hd-2" class="col-lg-2">Type Of News</th>
                                            <th id="trs-hd-2" class="col-lg-2">Status</th>
                                            <th id="trs-hd-2" class="col-lg-2">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $show_tintuc = $tt->lietke_tintuc();
                                            if($show_tintuc){
                                                $i = 0;
                                                while($result = $show_tintuc->fetch_assoc()){
                                                    $i++;
                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['Tentintuc'] ?></td>
                                            <td><img src="hinhanh/<?php echo $result['Hinhanh'] ?>" width="80"></td>
                                            <td><?php echo $result['Mota'] ?></td>

                                            <td><?php echo $result['Tieude'] ?></td>
                                            <td>
                                                 <?php
                                                if($result['Trangthai']==1){
                                                ?>
                                                <a <?php echo $result['Trangthai'] ?>&Trangthai=0>Display</a> 
                                                <?php
                                                 }else{
                                                ?>  
                                                <a <?php echo $result['Trangthai'] ?>&Trangthai=1>Hide</a> 
                                                <?php
                                                }
                                                ?>
                                                
                                            </td>
                        
                                            <td>
                                                <a onclick = "return confirm('Want to delete?')" href="?xoatintuc=<?php echo $result['Idtintuc'] ?>" >
                                                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                </a>
          
                                                &middot;
                                                                                               
                                                <a href="suatintuc.php?suatintuc=<?php echo $result['Idtintuc'] ?>">
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