<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Mutiara Motor Car Rental Portal | Registrasi</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style>
    .form-control {
        padding-left: 40px;
    }
    .input-icon {
        position: relative;
    }
    .input-icon > i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-container {
        background: #f7f7f7;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .btn-custom {
        background-color: #5cb85c;
        color: #fff;
    }
    .btn-custom:hover {
        background-color: #4cae4c;
        color: #fff;
    }
    .checkbox label a {
        color: #5cb85c;
    }
</style>
<script type="text/javascript">
function checkLetter(theform)
{
		pola_nama=/^[a-zA-Z .]*$/;
		if (!pola_nama.test(theform.fullname.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama!');
		theform.fullname.focus();
		return false;
		}
		
		if(theform.pass.value!= thform.conf.value)
		{
			alert("New Password and Confirm Password Field do not match!");
			theform.conf.focus();
			return false;
		}
		return (true);
}
 
</script>

<script type="text/javascript">
	function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_availability.php",
		data:'emailid='+$("#emailid").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>
</head>
<body>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<section class="user_profile inner_pages">
  <div class="container">
      <div class="user_profile_info">
          <h6 align="center">Registrasi User</h6>
          <div class="col-md-6 col-md-offset-3 form-container">
              <form method="post" name="theform" action="registact.php" id="theform" onSubmit="return checkLetter(this);" enctype="multipart/form-data">
                <div class="form-group input-icon">
                  <i class="fa fa-user"></i>
                  <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required="required">
                </div>
                <div class="form-group input-icon">
                  <i class="fa fa-phone"></i>
                  <input type="number" class="form-control" name="mobileno" placeholder="Nomer Telepon" minlength="10" maxlength="15" required="required">
                </div>
                <div class="form-group input-icon">
                  <i class="fa fa-envelope"></i>
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Alamat Email" required="required">
                  <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group input-icon">
                  <i class="fa fa-home"></i>
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
                </div>
                <div class="form-group">
                    <label>Upload Foto KTP <span style="color:red">*</span></label>
                    <input type="file" class="form-control" name="img1" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto KK <span style="color:red">*</span></label>
                    <input type="file" class="form-control" name="img2" accept="image/*" required>
                </div>
                <div class="form-group input-icon">
                  <i class="fa fa-lock"></i>
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">
                </div>
                <div class="form-group input-icon">
                  <i class="fa fa-lock"></i>
                  <input type="password" class="form-control" id="conf" name="conf" placeholder="Konfirmasi Password" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">Saya Setuju dengan <a href="#">Syarat dan Ketentuan yang berlaku</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" class="btn btn-custom btn-block">
                </div>
              </form>
              <div class="text-center">
                  <p>Sudah punya akun? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Disini</a></p>
              </div>
          </div>
      </div>
  </div>
</section>

<!--/Profile-setting--> 

<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>