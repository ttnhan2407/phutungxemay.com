<?php
    include 'lib/session.php';
    Session::init();
?>

<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
        

    $db = new Database();
    $fm = new Format();
    $gh = new giohang();
    $lsp = new loaisanpham();
    $th = new thuonghieu();
    $sl = new slider();
    $kh = new khachhang();
    $sp = new sanpham();
    $tt = new tintuc();
   
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Can Tho Motorcycle Parts</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

     <link rel="icon" type="image/x-icon" href="img/1.png">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <!-- Topbar Start -->
    <?php 
    if(isset($_GET['customer_id'])){
        $delCart = $gh->xoa_dulieu_giohang();
        Session::destroy();
        }
    ?>
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary" href="">FAQs</a>
                    <span class="text-primary px-2">|</span>
                    <a class="text-primary" href="">Help</a>
                    <span class="text-primary px-2">|</span>
                    <a class="text-primary" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-2" href="https://www.facebook.com/groups/182096926937659/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    </a>
                    <a class="text-primary px-2" href="https://www.instagram.com/atom_cubi/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-primary pl-2" href="https://www.youtube.com/channel/UCsmE4tsXcXqcpcQdQVJAgcg">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h5 class="text-primary m-0 display-5 font-weight-semi-bold">Can Tho Motorcycle Parts</h5>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="timkiem_sanpham.php" method="post">
                    <div class="input-group" style="padding-left: 60px;">
                        <input type="text" class="form-control" placeholder="Search.........." name="tukhoa">
                        <button type="submit" style="border:  3px solid #f0f0f0;" class="input-group-append text-secondary">
                            
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        
                        </button> 
                        
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                
                <a href="sanphamyeuthich.php" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <!-- <span class="badge">0</span> -->
                </a>
                <a href="giohang.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">
                        
                        <?php
                                    $check_cart = $gh->kiemtra_giohang();
                                        if($check_cart){
                                            $qty = Session::get("qty");
                                            echo $fm->format_currency($qty);
                                            }else{
                                            echo '0';
                                        }

                        ?>
                                        
                    </span>
                </a>
                   

            </div>
            
            <?php
                            $login_check = Session::get('customer_login'); 
                            if($login_check==false){
                                echo '<a href="login.php" class="nav-item nav-link">Login</a>';
                            }else{
                                echo '<a href="?customer_id='.Session::get('customer_id').'" class="nav-item nav-link">Logout</a>';
                            }
            ?> 
        </div>
    </div>
    <!-- Topbar End -->