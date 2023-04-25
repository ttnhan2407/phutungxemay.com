<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/giohang.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
    $gh = new giohang();
    if(isset($_GET['shiftid'])){       
        $Iddathang = $_GET['shiftid'];
        $thoigian = $_GET['thoigian'];
        $Giaban = $_GET['Giaban'];
        $shifted = $gh->shifted($Iddathang,$thoigian,$Giaban);
    }

    if(isset($_GET['xoa_hoa_don'])){
        $Iddathang = $_GET['xoa_hoa_don'];
        $thoigian = $_GET['thoigian'];
        $Giaban = $_GET['Giaban'];
        $del_shifted = $gh->xoa_hoadon($Iddathang,$thoigian,$Giaban);
    }

?>

     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                            </div>
                            <div class="card-body">
                                 <?php 
                                if(isset($shifted)){
                                    echo $shifted;
                                }
                                ?>
                                <?php 
                                        if(isset($del_shifted)){
                                            echo $del_shifted;
                                        }
                                ?>
                                <table class="table table-hover table-bordered">

                                    <thead class="bill-header cs">
                                        <tr>
                                            <th>No.</th>
                                            <th>Booking Date</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>                                            
                                            <th>Customer</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    $gh = new giohang();
                                    $fm = new Format();
                                    $get_inbox_cart = $gh->get_inbox_cart();
                                    if($get_inbox_cart){
                                        $i = 0;
                                        while($result = $get_inbox_cart->fetch_assoc()){
                                            $i++;
                                     ?>
                                       
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $fm->formatDate($result['Ngaymua']) ?></td>
                                            <td><?php echo $result['Tensp'] ?></td>
                                            <td><?php echo $result['Soluong'] ?></td>
                                            <td><?php echo $result['Giaban'] ?></td>
                                            
                                            
                                            <td>
                                                <a href="khachhang.php?idkhachhang=<?php echo $result['Idkhachhang'] ?>"><i class="fas fa-eye"></i>View customer information</a>

                                            </td>
                                            <td>
                                                <?php 
                                                if($result['Tinhtrang']==0){
                                                ?>

                                                <a href="?shiftid=<?php echo $result['Iddathang'] ?>&Giaban=<?php echo $result['Giaban'] ?>&thoigian=<?php echo $result['Ngaymua'] ?>">Order processing</a>
                                                <?php
                                                }else{
                                                ?>

                                                <a href="?xoa_hoa_don=<?php echo $result['Iddathang'] ?>&Giaban=<?php echo $result['Giaban'] ?>&thoigian=<?php echo $result['Ngaymua'] ?>"><i class="fa fa-trash" style="font-size: 15px;"></i></a>

                                                <?php
                                                    }
                                                
                                                ?>
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