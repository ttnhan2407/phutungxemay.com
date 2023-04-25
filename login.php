<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<?php
        $login_check = Session::get('customer_login'); 
        if($login_check){
            echo "<script> window.location ='index.php'</script>";
        }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        
        $login_Customers = $kh->khachhang_dangnhap($_POST);
        
    }
?>

    <!-- dang nhap -->
    <div class="container-fluid pt-5">
        <div class="wrapper">
            <form id="from-login" action="" method="post">
            <h1 class="form-heading">Login</h1>
            <?php
            if(isset($login_Customers)){
                echo $login_Customers;
            }
            ?>
            <div id="form-group">
                <input type="text" class="form-input" name="Email" placeholder="Email">
            </div>
            <div id="form-group">
                <input type="password" class="form-input" name="Matkhau" placeholder="Password">
                <a id="icon"><i class="far fa-eye-slash"></i></a>
            </div>
            <input type="submit" name="login" value="Log in" class="form-submit">
            </form>
            
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
          $(document).ready(function(){
            $('#icon').click(function(){
                $(this).toggleClass('open');
                $(this).children('i').toggleClass('fa-eye fa-eye-slash ');
                if($(this).hasClass('open')){
                  $(this).prev().attr('type', 'text');
                }else{
                  $(this).prev().attr('type', 'password');
                }

            });

          });

    </script>

<?php include 'inc/footer.php';?>
