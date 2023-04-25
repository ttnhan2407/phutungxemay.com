<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisanpham.php';?>
<?php include '../classes/thuonghieu.php';?>
<?php include '../classes/sanpham.php';?>
<?php
    $SanPham = new sanpham();
    $fm = new Format();
    if(isset($_GET['xoasanpham'])){
        $id = $_GET['xoasanpham']; 
        $xoa_sanpham = $SanPham->xoa_san_pham($id);
    }
?>     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">List Product</h6>
                            </div>
                            <?php
                            if(isset($xoa_sanpham)){
                                echo $xoa_sanpham;
                            }
                            ?> 
                            <div class="card-body" style="text-align: center;">
                                <table class="table table-hover table-bordered">
                                        <thead class="bill-header cs">
                                          <tr>
                                            <th>No.</th>                            
                                            <th>Name Product</th>
                                            <th>Price</th>
                                            <th>Product Picture</th>
                                            <th>Categpry</th>
                                            <th>Brand</th>
                                            <th>Describe</th>
                                            <th>Content</th>
                                            <th>Properties</th>
                                            <th>Activate</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php
            
                                            $danhsachsanpham = $SanPham->lietke_sanpham();
                                            if($danhsachsanpham){
                                                $i = 0;
                                                while($result = $danhsachsanpham->fetch_assoc()){
                                                    $i++;
                                            ?>
                                          <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['Tensp'] ?></td>
                                            <td><?php echo $result['Giaban'] ?></td>
                                            <td><img src="hinhanh/<?php echo $result['Anhsanpham'] ?>" width="80"></td>
                                            <td><?php echo $result['Tenloai'] ?></td>
                                            <td><?php echo $result['Tenthuonghieu'] ?></td>
                                            <td><?php echo $fm->textShorten($result['Mota'], 20); ?></td>
                                            <td><?php echo $fm->textShorten($result['Noidung'], 20); ?></td>
                                            <td><?php 
                                                    if($result['Thuoctinh']==1){
                                                        echo 'Featured products';
                                                    }else{
                                                        echo 'Products not featured';
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <a onclick = "return confirm('Want to delete?')" href="?xoasanpham=<?php echo $result['Idsanpham'] ?>" >
                                                    <i class="fa fa-trash" style="font-size: 15px;"></i>
                                                </a>
          
                                                &middot;
                                                                                               
                                                <a href="sua_sanpham.php?capnhat_sanpham=<?php echo $result['Idsanpham'] ?>">
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