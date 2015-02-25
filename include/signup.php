<?php
/**
 * Created by PhpStorm.
 * User: Amir
 * Date: 2/17/2015
 * Time: 6:45 PM
 */
$error = '';
if(isset($_POST['user_submit'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $presenter = $_POST['presenter'];
    $register_date = time();
    if($password == $repassword){
        $user_query = "INSERT INTO `users`(`users_id`, `users_firstName`, `users_lastName`, `users_email`, `users_password`, `users_gender`, `users_phone`, `users_mobile`, `users_address`, `users_purchase`, `users_presents`, `users_registerDate`) VALUES
                                          ('','$first_name','$last_name','$email',SHA1('$password'),'$gender','$phone','$mobile','$address','','','$register_date')";
        $user_result = mysqli_query($connection , $user_query);
        if($user_result){
            $error = '
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>تبریک!</strong> ثبت نام با موفقیت انجام شد .
            </div>
            ';
        }
    }else{
        $error = '
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>خطا!</strong> عدم تطابق کلمه عبور با تکرار آن .
        </div>
        ';
    }
}

?>

<div class="title"><h1 class="title-text">ثبت نام کاربر</h1></div>
<form class="form-horizontal col-md-8 col-md-offset-2" dir="rtl" method="post">
    <div class="form-group">

        <div class="col-xs-10">
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
        </div>
        <label for="first_name" class="col-xs-2 control-label"><span class="text-danger">*</span> نام :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
        </div>
        <label for="last_name" class="col-xs-2 control-label"><span class="text-danger">*</span> نام خانوادگی :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10" style="font-family: tahoma, koodak">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
        </div>
        <label for="inputEmail" class="col-xs-2 control-label"><span class="text-danger">*</span> ایمیل :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
        </div>
        <label for="inputPassword" class="col-xs-2 control-label"><span class="text-danger">*</span> کلمه عبور :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Rewrite Password" required>
        </div>
        <label for="repassword" class="col-xs-2 control-label"><span class="text-danger">*</span> تکرار  کلمه عبور :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="radio" id="gender" name="gender" value="مرد"  checked> مرد |
            <input type="radio" id="gender" name="gender" value="زن"> زن
        </div>
        <label for="last_name" class="col-xs-2 control-label"><span class="text-danger">*</span> جنسیت :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
        </div>
        <label for="phone" class="col-xs-2 control-label"><span class="text-danger">*</span> تلفن ثابت :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required>
        </div>
        <label for="mobile" class="col-xs-2 control-label"><span class="text-danger">*</span> تلفن همراه :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <textarea class="form-control" name="address" id="address" placeholder="Address" rows="4" required></textarea>
        </div>
        <label for="address" class="col-xs-2 control-label"><span class="text-danger">*</span> آدرس :</label>
    </div>
    <hr>
    <div class="form-group">

        <div class="col-xs-10">
            <input type="text"  name="presenter" class="form-control" id="presenter" placeholder="Presenter">
        </div>
        <label for="presenter" class="col-xs-2 control-label">معرف :</label><div class="clearfix"></div>
        <p class="text-danger">لطفاً در صورت وجود،  نام کاربری شخصی که این سامانه را به شما معرفی کرده وارد نمایید.</p>
    </div>
    <hr>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="user_submit" class="btn btn-success">ثبت</button>
            <input type="reset" class="btn btn-primary" value="ویرایش">
        </div>
    </div>
    <?php echo $error; ?>
</form>