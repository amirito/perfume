<?php require_once('core/core.php');


if(isset($_POST['id'])){
    if(!isset($_SESSION['id'])){
        $_SESSION['id'][0]= 0;
        $_SESSION['id'][1]= $_POST['id'];
    }else{

        if(!array_search($_POST['id'],$_SESSION['id'],true)){
            array_push($_SESSION['id'],$_POST['id']);
        }else{
            $iterative = "این محصول قبلاً انتخاب شده";
        }

    }
    //var_dump($_SESSION['id']);
}


$error = '';
if(isset($_POST['login'])){
    $login_name = $_POST['login_name'];
    $login_password = $_POST['login_password'];
    $login_query = "SELECT * FROM users WHERE users_email='$login_name' AND users_password=SHA1('$login_password')";
    $login_result = mysqli_query($connection , $login_query);
    $login_count = mysqli_num_rows($login_result);
    if($login_count === 1){
        $login_row = mysqli_fetch_assoc($login_result);
        $_SESSION['MM_ID'] = $login_row['users_id'];

        header('Location: index.php?page=home');
    }else{
        $error = '
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>خطا!</strong> نام کاربری یا کلمه عبور صحیح نمیباشد .
            </div>
            ';
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>فروشگاه عطر</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/modernizr.custom.26887.js"></script>
    <script src="js/jquery.imgslider.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/modernizr.custom.js"></script>


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?page=home">Brand</a>
        </div>
        <!-- --------------------shopping cart--------------------- -->
        <?php
            #### delete item
            if(isset($_POST['del_id'])){
                $del = $_POST['del_id'];
                foreach($_SESSION['id'] as $key2=>$value2){
                    if($del==$value2){
                        unset($_SESSION['id'][$key2]);
                    }
                }
            }
        ?>
        <div class="col-lg-3 col-md-4 col-sm-5">
            <button type="button" class="btn btn-success btn-block dropdown-toggle" data-toggle="dropdown" style="font-size:22px !important">سبد خرید <i class="fa fa-shopping-cart"></i></button>
            <ul class="dropdown-menu cart-content" role="menu">
                <?php
                $totalPrice = 0 ;

                if(isset($_SESSION['id'])){

                    $i = 1;

                    foreach($_SESSION['id'] as $key=>$value){
                        ### show detail
                        if($key != 0){
                            $pro_query = "SELECT * FROM products WHERE products_id = '$value' ; ";
                            $pro_result = mysqli_query($connection,$pro_query);
                            $pro_row = mysqli_fetch_assoc($pro_result);
                            echo '<li style="margin-top:10px">
											<a href="detail.html" class="inline">
												<p class="commando">'.$pro_row['products_name'].' </p>
												<p>قیمت : '.$pro_row['products_price'].'</p>
											</a>
											<form method="post">
												<input type="hidden" name="del_id" value="'.$pro_row['products_id'].'">
												<input type="submit" name="delete" class="btn btn-danger btn-block" value="حذف" class="btn-link">
											</form>
										</li><hr>';
                            $i++;
                            $totalPrice += $pro_row['products_price'];
                        }
                    }

                }else{
                    echo 'محصولی انتخاب نشده';
                }

                ?>

                <li class="divider"></li>
                <li><a href="#">مجموع قیمت: <?php echo $totalPrice; ?></a>
                    <?php
                    if(isset($_SESSION['MM_ID'])){
                        echo'
                                	<a class="btn btn-success" href="?page=buy">نهایی کردن خرید</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
        <!-- --------------------/shopping cart--------------------- -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" dir="rtl">برندها
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-brand" role="menu">
                        <?php
                        $brand_query = "SELECT * FROM brands";
                        $brand_result = mysqli_query($connection,$brand_query);
                        while($brand_row = mysqli_fetch_assoc($brand_result)){
                            echo"
                            <li><a href='?page=products&brand=".$brand_row['brands_id']."'>".$brand_row['brands_name']."</a></li>
                            ";
                        }
                        ?>


                    </ul>
                </li>
                <li class="pull-right"><a href="?page=products&category=men">مردانه</a></li>
                <li class="pull-right"><a href="?page=products&category=women">زنانه</a></li>
                <?php
                if(isset($_SESSION['MM_ID'])){
                    echo '<li class="pull-right"><a href="logout.php">خروج</a></li>';
                }

                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="jumbotron header-bottom" dir="rtl">
    <div class="container text-center">
        <a href="?page=home"><img src="images/logo-home.png"></a>
    </div>
    <section class="color-5 text-center">
        <?php
        if(!isset($_SESSION['MM_ID'])){
            echo '
            <nav class="cl-effect-5">
                <a href="#"><span data-hover="ورود"  style="width: 60px" class="md-trigger" data-modal="modal-16">ورود</span></a>
                <a href="?page=signup"><span data-hover="ثبت نام" style="width: 60px">ثبت نام</span></a>
            </nav>
        ';
        }else{
            $signed_query = "SELECT * FROM users WHERE users_id = '$_SESSION[MM_ID]'";
            $signed_result = mysqli_query($connection , $signed_query);
            $signed_row = mysqli_fetch_assoc($signed_result);
            echo '
                <nav class="cl-effect-5">
                    <a href="#"><span data-hover="'.$signed_row['users_firstName'].'" style="width: auto;">'.$signed_row['users_firstName'].'</span> عزیز خوش آمدید</a>

                </nav>
            ';
        }

        ?>
    </section>
    <?php echo $error; ?>
</div>
<div class="header-border"></div>
<div class="clearfix"></div>

<?php

if(isset($_GET['page'])){
    if(is_file('include/'.$_GET['page'].'.php')){
        include 'include/'.$_GET['page'].'.php';
    }else{
        die('صفحه مورد نظر وجود ندارد');
    }
}else{
    include 'include/home.php';
}
?>

<div class="clearfix"></div>
<hr>
<div class="footer-top">
    <div class="col-md-6">
        <ul class="list-unstyled list-inline">
            <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
            <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
            <li><a href="#"><i class="fa fa-instagram"></i> </a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
        </ul>
    </div>
    <div class="col-md-6"></div>
</div>
<div class="clearfix"></div>
<footer>
    <div class="col-sm-9" style="border-bottom: solid 1px #bbb">
        <div class="col-sm-4" dir="rtl">
            <h3>تماس با ما</h3>
            <ul class="list-unstyled">
                <li>تهران - خیابان آزادی - خیابان نمایندگی - پلاک 1 - واحد 15</li>
                <li>تلفن: <a href="callto:+982166576199">66576199-021</a></li>
                <li>ایمیل: <a href="mailto:info@rayweb.ir">info@rayweb.ir</a></li>
            </ul>
        </div>
        <div class="col-sm-4" dir="rtl">
            <h3>ارتباط با ما</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1620.018638097106!2d51.3709818!3d35.7007003!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sir!4v1421244078741" width="100%" height="200" frameborder="0" style="border:0"></iframe>
        </div>
        <div class="col-sm-4" dir="rtl">
            <h3>لینک های مرتبط</h3>
            <ul class="list-unstyled text-right">
                <li><a href="#"><i class="fa fa-chevron-circle-left"></i> صفحه اصلی</a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-left"></i> مردانه</a> </li>
                <li><a href="#"><i class="fa fa-chevron-circle-left"></i> زنانه</a> </li>
                <li><a href="#"><i class="fa fa-chevron-circle-left"></i> درباره ما</a> </li>
                <li><a href="#"><i class="fa fa-chevron-circle-left"></i> تماس با ما</a> </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <h4 dir="ltr" class="text-center" style="font-family: verdana">2014 © Rayweb. All rights reserverd. </h4>
    </div>
</footer>

<div  class="md-modal md-effect-16" id="modal-16">
    <div class="md-content">

        <div>
            <section class="main">
                <form class="form-2" dir="rtl" method="post">
                    <h1>ورود کاربر</h1>
                    <p class="float pull-right">
                        <label for="login"><i class="icon-user"></i>نام کاربری</label>
                        <input type="text" name="login_name" placeholder="Username">
                    </p>
                    <p class="float pull-right">
                        <label for="password"><i class="icon-lock"></i>کلمه عبور</label>
                        <input type="password" name="login_password" placeholder="Password" class="showpassword">
                    </p>
                    <p class="clearfix">
                        <a href="#" class="log-twitter">Log in with Facebook</a>
                        <input type="submit" name="login" value="Log in">
                    </p>
                    <button class="md-close btn btn-danger btn-block">بستن</button>

                </form>​​​
            </section>

        </div>
    </div>
</div>
<script src="js/classie.js"></script>
<script src="js/modalEffects.js"></script>
<script>
    // this is important for IEs
    var polyfilter_scriptpath = '/js/';
</script>
<script src="js/cssParser.js"></script>
<script src="js/css-filters-polyfill.js"></script>
</body>
</html>