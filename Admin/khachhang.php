<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/khachhang.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
    $kh = new khachhang();
    if(!isset($_GET['idkhachhang']) || $_GET['idkhachhang']==NULL){
       echo "<script>window.location ='sua_danhmuc.php'</script>";
    }else{
        $id = $_GET['idkhachhang']; 
    }
     

?>
     

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
                            </div>
                            <?php
                              $get_customer = $kh->thongtin_khachhang($id);
                                if($get_customer){
                                    while($result = $get_customer->fetch_assoc()){
                                               
                            ?>
                            <div class="card-body">
                                
                                <table class="table table-hover table-bordered">
                                   <tbody class="align-middle">
                                        
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $result['Tenkhachhang'] ?></td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo $result['Diachi'] ?></td>
                                           
                                           
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $result['Sophone'] ?></td>
                                            
                                           
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $result['Email'] ?></td>
                                           
                                        </tr>


                                    </tbody>
                                                       
                                </table>
                                 
                                  <a style="background: red" class="btn btn-info" href="donhang.php">Cancel</a>
                                 
                            </div>
                              <?php
                              }
                               }
                              ?>
                        </div>
                    </div>
                </main>
<?php include 'inc/footer.php';?>