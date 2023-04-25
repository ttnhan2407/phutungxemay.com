<?php include 'inc/header.php';?>
<?php include 'inc/menu.php';?>
<?php
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertCustomers = $kh->dangky_taikhoang($_POST);
        
    }
?>

    <!-- login Start -->
    <div class="container-fluid pt-5">
        <div class="wrapper">
            <style type="text/css">
                span.error {
                    color: red;
                    text-align: center;
                }
            </style>
            <form id="from-login"  action="" method="post">
            <h1 class="form-heading">Register</h1>
            <?php
            if(isset($insertCustomers)){
                echo $insertCustomers;
            }
            ?>
            <div id="form-group">
                <input type="text" class="form-input" name="Tenkhachhang" placeholder="First and last name">
            </div>
            <div id="form-group">
                <input type="phones" class="form-input" name="Sophone" placeholder="Phone number">
            </div>
            <div id="form-group">
                <input type="text" class="form-input" name="Email" placeholder="Email">
            </div>
            <div id="form-group">
                <input type="password" class="form-input" name="Matkhau" placeholder="Password">
            </div>
             <div id="form-group">
                <input type="text" class="form-input" name="Diachi" placeholder="Address">
            </div>
            <input type="submit" name="submit" value="Create Account" class="form-submit">

            </form>
            
        </div>
    </div>
    <!-- Shop End -->
<?php include 'inc/footer.php';?>
