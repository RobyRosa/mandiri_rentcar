<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['ulogin']) == 0) { 
    header('location:index.php');
} else {
    if (isset($_POST['updateprofile'])) {
        $name = $_POST['fullname'];
        $mobileno = $_POST['mobilenumber'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        
        $sql = "UPDATE users SET nama_user='$name', telp='$mobileno', alamat='$address' WHERE email='$email'";
        $query = mysqli_query($koneksidb, $sql);
        
        if ($query) {
            $msg = "Profil berhasil diperbarui.";
        } else {
            echo "No Error : " . mysqli_errno($koneksidb);
            echo "<br/>";
            echo "Pesan Error : " . mysqli_error($koneksidb);
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobil | My Profile</title>
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
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
<script type="text/javascript">
function checkLetter(theform) {
    var pola_nama = /^[a-zA-Z .]*$/;
    if (!pola_nama.test(theform.fullname.value)) {
        alert('Hanya huruf yang diperbolehkan untuk Nama!');
        theform.fullname.focus();
        return false;
    }
    return true;
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

<!--Page Header-->
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Profil Anda</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Profile</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['ulogin'];
$sql = "SELECT * from users where email='$useremail'";
$query = mysqli_query($koneksidb,$sql);
while($result=mysqli_fetch_array($query)){
?>
<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info">
            <div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <?php if($msg){ ?>
                    <div class="alert alert-success" role="alert">
                        <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <form method="post" name="theform" onsubmit="return checkLetter(this);">
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Tanggal Daftar:</label>
                        <p><?php echo htmlentities($result['RegDate']); ?></p>
                    </div>

                    <?php if ($result['UpdationDate'] != "") { ?>
                        <div class="form-group">
                            <label class="control-label font-weight-bold">Terakhir diupdate pada:</label>
                            <p><?php echo htmlentities($result['UpdationDate']); ?></p>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">Nama:</label>
                        <input class="form-control" name="fullname" value="<?php echo htmlentities($result['nama_user']); ?>" id="fullname" type="text" required style="border-radius: 5px; border: 1px solid #ced4da; padding: 10px;">
                    </div>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">Alamat Email:</label>
                        <input class="form-control" value="<?php echo htmlentities($result['email']); ?>" name="email" id="email" type="email" required readonly style="border-radius: 5px; border: 1px solid #ced4da; padding: 10px;">
                    </div>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">Telepon:</label>
                        <input class="form-control" name="mobilenumber" value="<?php echo htmlentities($result['telp']); ?>" id="phone-number" type="number" min="0" required style="border-radius: 5px; border: 1px solid #ced4da; padding: 10px;">
                    </div>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">Alamat:</label>
                        <textarea class="form-control" name="address" rows="4" style="border-radius: 5px; border: 1px solid #ced4da; padding: 10px;"><?php echo htmlentities($result['alamat']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">KTP:</label><br/>
                        <div class="card ktp-card" style="max-width: 320px; border: 1px solid #ced4da; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; margin-bottom: 10px;">
                            <img src="image/id/<?php echo htmlentities($result['ktp']); ?>" style="width: 100%; height: auto; display: block;">
                            <div class="card-body text-center" style="padding: 10px;">
                                <a href="gantiktp.php?">Ganti KTP</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label font-weight-bold">KK:</label><br/>
                        <div class="card ktp-card" style="max-width: 320px; border: 1px solid #ced4da; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; margin-bottom: 10px;">
                            <img src="image/id/<?php echo htmlentities($result['kk']); ?>" style="width: 50%; height: auto; display: block;">
                            <div class="card-body text-center" style="padding: 10px;">
                                <a href="gantikk.php?">Ganti KK</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="updateprofile" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; border-radius: 5px; padding: 10px 20px; display: inline-flex; align-items: center;">
                            Simpan Perubahan
                            <span class="angle_arrow" style="margin-left: 5px;">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </form>
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
<?php } ?>
