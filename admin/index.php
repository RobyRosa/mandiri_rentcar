<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql = "SELECT * FROM admin WHERE UserName='$email' AND Password='$password'";
$query = mysqli_query($koneksidb,$sql);
$results = mysqli_fetch_array($query);
if(mysqli_num_rows($query)>0){
	$_SESSION['alogin']=$_POST['username'];
	echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
	echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Rental Mobil | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



	<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        body {
            background: #000;
            font-family: 'Roboto', sans-serif;
            color: #fff;
        }
        .form-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .form-control::placeholder {
            color: #ccc;
        }
        .btn-primary {
            border-radius: 30px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            box-shadow: 0 0 20px #2575fc;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            box-shadow: 0 0 25px #6a11cb;
        }
        .text-light {
            color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .mt-4x {
            margin-top: 2rem;
        }
        .pt-2x {
            padding-top: 1rem;
        }
        .pb-3x {
            padding-bottom: 1.5rem;
        }
        .bk-light {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        label {
            text-shadow: 0 0 5px #fff;
        }
    </style>
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/bg_login.png);">
	<div class="form-content">
        <div class="container">
            <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
            <div class="well row pt-2x pb-3x bk-light">
                <div class="col-md-12">
                    <form method="post">
                        <label for="username" class="text-uppercase text-sm">Username</label>
                        <input type="text" placeholder="Username" name="username" class="form-control mb" id="username">

                        <label for="password" class="text-uppercase text-sm">Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control mb" id="password">

                        <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>