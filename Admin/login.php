
<?php
    include '../classes/adminlogin.php';
?>

<?php
    $class = new adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Emailadmin = $_POST['Emailadmin'];
        $Matkhauadmin = md5($_POST['Matkhauadmin']);

        $login_check = $class->login_admin($Emailadmin,$Matkhauadmin);
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin || Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background: white;">

    <div class="container">
        <!-- login Start -->
    <div class="container-fluid pt-5">
        <div class="wrapper" id="wrapper">
            <form action="login.php" method="post" id="from-login">
            <h1 class="form-heading">Login Admin</h1>
            <span>
            <?php

            if(isset($login_check)){
                echo $login_check;
            }
             ?>
             </span>
            <div id="form-group">
                <input type="text" class="form-input" name="Emailadmin" placeholder="Email">
            </div>
            <div id="form-group" >  
                <input type="password" class="form-input" name="Matkhauadmin" placeholder="Password">

                <a id="icon"><i class="far fa-eye-slash"></i></a>

            </div>
            <input type="submit" value="Login" class="form-submit">

            </form>
            
           
            
        </div>
    </div>
    <!-- login End -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
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

</body>

</html>