<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ulogin'])==0){ 
header('location:index.php');
}else{
if(isset($_POST['updateprofile'])){
	$name=$_POST['fullname'];
	$mobileno=$_POST['mobilenumber'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$sql="UPDATE users SET nama_user='$name',telp='$mobileno',alamat='$address' WHERE email='$email'";
	$query = mysqli_query($koneksidb,$sql);
	if($query){
	$msg="Profile berhasil diupdate.";
	}else{
		echo "No Error : ".mysqli_errno($koneksidb);
		echo "<br/>";
		echo "Pesan Error : ".mysqli_error($koneksidb);	
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rental Mobil | My Profile</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Custom Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
    .form-control:focus {
        box-shadow: none;
        border-color: #4ca1af;
    }
    .btn {
        background: #4ca1af;
        color: #fff;
    }
    .btn:hover {
        background: #3b8590;
        color: #fff;
    }
    .img-thumbnail {
        border: 2px solid #4ca1af;
    }
    .img-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .img-container a {
        margin-top: 10px;
        color: #4ca1af;
    }
    .img-container a:hover {
        color: #3b8590;
    }
</style>
<script type="text/javascript">
function checkLetter(theform) {
    pola_nama = /^[a-zA-Z .]*$/;
    if (!pola_nama.test(theform.fullname.value)){
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
$useremail = $_SESSION['ulogin'];
$sql = "SELECT * from users where email='$useremail'";
$query = mysqli_query($koneksidb, $sql);
while($result = mysqli_fetch_array($query)){
?>
<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info">
            <div class="col-md-12 col-sm-10">
                <?php if($msg){ ?>
                    <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
                <?php } ?>
                <form method="post" name="theform" onSubmit="return checkLetter(this);">
                    <div class="form-group">
                        <label class="control-label">Tanggal Daftar -</label>
                        <span><?php echo htmlentities($result['RegDate']); ?></span>
                    </div>
                    <?php if ($result['UpdationDate'] != "") { ?>
                        <div class="form-group">
                            <label class="control-label">Terakhir diupdate pada -</label>
                            <span><?php echo htmlentities($result['UpdationDate']); ?></span>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" name="fullname" value="<?php echo htmlentities($result['nama_user']); ?>" id="fullname" type="text" placeholder="Masukkan Nama Anda" required>
                        </div>
                    </div>
                    <div class="form-group">
        
