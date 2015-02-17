<?php require_once('core/core.php') ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>فروشگاه عطر</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/modernizr.custom.26887.js"></script>
    <script src="js/jquery.imgslider.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
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
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="pull-right"><a href="?page=products&category=men">مردانه</a></li>
                <li class="pull-right"><a href="?page=products&category=women">زنانه</a></li>
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
        <nav class="cl-effect-5">
            <a href="#"><span data-hover="ورود"  style="width: 60px">ورود</span></a>
            <a href="#"><span data-hover="ثبت نام" style="width: 60px">ثبت نام</span></a>
        </nav>
    </section>
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



</body>
</html>