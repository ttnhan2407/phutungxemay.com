<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/giohang.php');
include_once ($filepath.'/../helpers/format.php');

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Total Order List</h6>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <table class="table table-hover table-bordered">
                                <thead class="bill-header cs">
                                    <tr>
                                        <th id="trs-hd-1" class="col-lg-1">Total Order Customer</th>
                                        <th id="trs-hd-2" class="col-lg-2">Quantity</th>
                                        <th id="trs-hd-3" class="col-lg-3">Total Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      
									<?php 
									$gh = new giohang();
									$fm = new Format();
									$tong_donhang = $gh->tong_donhang();
									$tong_soluong_donhang = $gh->tong_soluong_donhang();
									$tong_danhthu_donhang = $gh->tong_danhthu_donhang();
									?>
									<tr class="odd gradeX">
									<td><?php echo $tong_donhang ?></td>
									<td><?php echo $tong_soluong_donhang ?></td>
									<td><?php echo number_format($tong_danhthu_donhang, 0, ',', ',') , " VND"; ?></td>
									</tr>
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </main>
<?php include 'inc/chart.php';?>
<?php include 'inc/footer.php';?>