<?php 
    include 'inc/header.php';
    include 'inc/menu.php';
?>
<?php
     if(isset($_GET['proid'])){
        $Idkhachhang = Session::get('customer_id');
         $proid = $_GET['proid']; 
         $delwlist = $sp->xoa_sp_thich($proid,$Idkhachhang);
     }
?>

    <!-- San pham yeu thich -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Delete</th>
                            <th>View Products</th>
                        </tr>
                    </thead>
                    <?php
                            $Idkhachhang = Session::get('customer_id');
                            $get_wishlist = $sp->sanpham_thich($Idkhachhang);
                            if($get_wishlist){
                                $i = 0;
                                while($result = $get_wishlist->fetch_assoc()){
                                    $i++;
                    ?>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><?php echo $i; ?></td>
                            <td class="align-middle"><?php echo $result['Tensp'] ?></td
                            ><td class="align-middle"><img width="100" src="Admin/hinhanh/<?php echo $result['Anhsanpham'] ?>" alt=""/></td>
                            <td class="align-middle"><?php echo $fm->format_currency($result['Giaban'])." "."VNĐ" ?></td>
                            <td class="align-middle"><a onclick = "return confirm('Do you want to delete the product?')" href="?proid=<?php echo $result['Idsanpham'] ?>" >
                            <i class="fa fa-trash text-danger" style="font-size: 15px;"></i>
                            </a>
                            </td>
                            <td class="align-middle">
                                <a href="chitiet_sanpham.php?proid=<?php echo $result['Idsanpham'] ?>">
                                <i  class="fas fa-eye text-primary" style="font-size: 15px;"></i>View Products
                                </a>
                            </td>
                            
                        </tr>
                    </tbody>
                    <?php
                            
                            }
                        }
                        ?>
                </table>
            </div>
            
        </div>
    </div>
    
    <!-- Cart End -->
<?php 
    include 'inc/footer.php';
    
 ?>

  