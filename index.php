<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM tblemployees where EmailId ='$username' AND Password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'admin/admin_dashboard.php'; </script>";
		    }
		    elseif ($row['role'] == 'Staff') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
		    }
		    else {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
		    }
		}

	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>special lab details</title>

<!-- Site favicon -->
<link rel="BIT" sizes="180x180" href="vendors/images/bitlogo.png">
<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/bitlogo.png">
<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/bitlogo.png">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-119386393-1');
</script>
</head>
<body class="login-page">
<div class="login-header box-shadow">
<div class="container-fluid d-flex justify-content-between align-items-center">
<div class="brand-logo">
<a href="login.html">
	<img src="vendors/images/lablogo.png" alt=" BIT logo" height="95px" width="95px">
</a>
</div>
</div>
</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				
<div class="col-md-6 col-lg-5">
<div class="login-box bg-white box-shadow border-radius-10">
<div class="login-title">
<h2 class="text-center text-primary">Special Lab Portal</h2>
</div>
<form name="signin" method="post">

<div class="input-group custom">
<input type="text" class="form-control form-control-lg" placeholder="Email ID" name="username" id="username">
<div class="input-group-append custom">
</div>
</div>
<div class="input-group custom">
<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

</div>
<div class="row pb-30">

<div class="col-6">

</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="input-group mb-0">
<input class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit" value="Log In">
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>