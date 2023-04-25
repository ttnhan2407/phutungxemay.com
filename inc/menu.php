 <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Product Type</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <?php 
                            $getall_category = $lsp->hienthi_loaisanpham();
                                if($getall_category){
                                    while($result_allcat = $getall_category->fetch_assoc()){
                            ?>
                                <a href="loai_sanpham.php?catid=<?php echo $result_allcat['Idloai'] ?>" class="nav-item nav-link"><?php echo $result_allcat['Tenloai'] ?></a>
                            <?php
                                    }
                                }
                        ?>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                             <a href="index.php" class="nav-item nav-link ">Home Page</a>
                            <a href="sanpham.php" class="nav-item nav-link">Product</a>       
                            <a href="giohang.php" class="nav-item nav-link">Cart</a>

                            <!-- thông tin khach hang -->
                            <?php
                            $login_check = Session::get('customer_login'); 
                            if($login_check==false){
                                echo '';
                            }else{
                                echo '<a href="thongtin.php" class="nav-item nav-link">Customer Information</a>';
                            }
                             ?>
                            
                             <!-- Đơn hàng -->
                            <?php
                            $customer_id = Session::get('customer_id');
                            $check_order = $gh->check_order($customer_id);
                            if($check_order==true){
                                echo '<a href="chitiet_donhang.php" class="nav-item nav-link">Order</a>';
                            }else{
                                echo '';
                            }
                            ?>
                            <!-- Sản phẩm thích -->
                            <?php
    
                                $login_check = Session::get('customer_login'); 
                                if($login_check){
                                    echo '<a href="sanphamyeuthich.php" class="nav-item nav-link">Favorite Products</a>';
                                }
                                    
                            ?>
                            

                            <a href="lienhe.php" class="nav-item nav-link">Contact</a>

                            <!-- Tin tức -->

                            <div class="nav-item dropdown">
                             <a href="#" class="nav-item nav-link" data-toggle="dropdown">
                                News
                                <i class="fa fa-angle-down text-dark"></i>
                            </a>

                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <?php 
                                        $danhmuctintuc = $tt-> hienthi_danhmuc_tintuc();
                                            if($danhmuctintuc){
                                                while($result_danhmuc = $danhmuctintuc->fetch_assoc()){
                                        ?>
                                            <a href="tintuc.php?iddanhmuc=<?php echo $result_danhmuc['Iddanhmuc'] ?>" class="dropdown-item"><?php echo $result_danhmuc['Tieude'] ?></a>
                                        <?php
                                                }
                                            }
                                        ?>
                            </div>
                            </div>



                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            $login_check = Session::get('customer_login'); 
                            if($login_check==true){
                                echo '';
                            }else{
                                echo '<a href="dangky.php" class="nav-item nav-link">Register</a>';
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->