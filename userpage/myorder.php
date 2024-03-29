<?php
session_start();
if(isset($_SESSION['cakeuser']))
{
$cakeuser=$_SESSION['cakeuser'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>CYBAKE - user</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!--<link href="img/feature.jpg" rel="icon">-->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
td{
	border-bottom:1px solid gray;
	padding-top:15px;
}
th{
	
	padding:10px;
	color:white;
}
</style>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Mangalore</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.30 AM - 06.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+91 9090909090</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
	
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">CYBAKE</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="product.php" class="nav-item nav-link ">Cake Designs</a>
                <a href="snacks.php" class="nav-item nav-link ">Snacks and Desserts</a>
				<a href="cart.php" class="nav-item nav-link">View Invoice </a>
				<a href="myorder.php" class="nav-item nav-link active">My Order</a>
                <a href="contact.php" class="nav-item nav-link">My Feedback</a>
				<a href="logout.php" class="nav-item nav-link">LOGOUT</a>
            </div>
    </nav>
    <!-- Navbar End -->

    


    <!-- Quote Start -->
	<div class="text-center">
                <h1 class="display-5 mb-5">My Order (Snacks And Desserts)</h1>
				
    </div>
	
	
	
	<!-- Sales Table-->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="col-md-12">
			<center>
                <table style="width:80%;text-align:center;border:1px solid gray;">
                <tr style="border:1px solid black;background-color:gray;">
				<th>Sl.No</th>
				<th>Date</th>
				<th>Type</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Action</th>
                </tr>
				<?php
									include 'config.php';
									$sql1 = "SELECT snackorder.*, snacks.* FROM snackorder INNER JOIN snacks ON snackorder.pid=snacks.id where snackorder.userid='".$cakeuser."'";
									$result1 = mysqli_query($con,$sql1);
									$num1=mysqlI_num_rows($result1);
									$sl=0;
									$total=0;
									if($num1 > 0)
									{ 
									while($row1 = mysqli_fetch_array($result1))
									{ 
									$sl+=1;
									$oid=$row1['oid'];
									$pid=$row1['pid'];
									$qty=$row1['qty'];
									$date=$row1['date'];
									$userid=$row1['userid'];
									$status=$row1['status'];
									$sid=$row1['id'];
									$type=$row1['type'];
									$name=$row1['name'];
									$price=$row1['price'];
									$total=$qty*$price;
									?>
				
				<tr>
				<td><?php echo $sl; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $type; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $price; ?>/-</td>
				<td><?php echo $qty; ?></td>
				<td><?php echo $total; ?>/-</td>
				<td>
				<form action="#" method="post" >
				<input type="text" name="did[]" value="<?php echo $oid; ?>" hidden="true">
				<?php if($status==''){?>
				<button type="submit" name="delete" class="btn btn-outline-warning btn-long cart">Delete</button>
				<?php } else if($status=='Accepted'){?>
				Accepted
				<?php } else { ?>
				Rejected
				<?php } ?>
				</form>
				</td>
				<td>
				<form action="#" method="post" >
				<input type="text" name="did[]" value="<?php echo $oid; ?>" hidden="true">
				<?php if($status=='Rejected'){?>
				<button type="submit" name="delete" class="btn btn-outline-warning btn-long cart">Delete</button>
				<?php } else if($status=='Accepted'){?>

				<?php } ?>
				</form>
				</td>
                </tr>
				<?php
									}
									}
									?>
				
				
				</table>
                </center>
            </div>
        </div>
    </div>
    <!-- Quote End -->
	
	
	
	<!-- Quote Start -->
	<div class="text-center">
                <h1 class="display-5 mb-5">My Order (DEISGN)</h1>
				
    </div>
	
	
	
	<!-- Sales Table-->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="col-md-12">
			<center>
                <table style="width:80%;text-align:center;border:1px solid gray;">
                <tr style="border:1px solid black;background-color:gray;">
				<th>Sl.No</th>
				<th>Type</th>
				<th>Flavour</th>
				<th>KG</th>
				<th>Delivered Order </th>
				<th>Order Date</th>
				<th>Message</th>
				<th>Action</th>
                </tr>
				<?php
									include 'config.php';
									$sql1 = "SELECT * FROM designorder where userid='".$cakeuser."'";
									$result1 = mysqli_query($con,$sql1);
									$num1=mysqlI_num_rows($result1);
									$sl=0;
									$total=0;
									if($num1 > 0)
									{ 
									while($row1 = mysqli_fetch_array($result1))
									{ 
									$sl+=1;
									$id=$row1[0];
									$pid=$row1[1];
									$type=$row1[2];
									$flavour=$row1[3];
									$kg=$row1[4];
									$date=$row1[5];
									$ordate=$row1[6];
									$msg=$row1[7];
									$status=$row1[9];
									?>
				
				<tr>
				<td><?php echo $sl; ?></td>
				<td><?php echo $type; ?></td>
				<td><?php echo $flavour; ?></td>
				<td><?php echo $kg; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $ordate; ?></td>
				<td><?php echo $msg; ?></td>
				<td>
				<form action="#" method="post" >
				<input type="text" name="dlid[]" value="<?php echo $id; ?>" hidden="true">
				<?php if($status==''){?>
				<button type="submit" name="delete1" class="btn btn-outline-warning btn-long cart">Delete</button>
				<?php } else if($status=='Accepted'){?>
				Accepted
				<?php } else { ?>
				Rejected
				<?php } ?>
				
				</form>
				</td>
                </tr>
				<?php
					}
					}
					?>
				
				
				</table>
                </center>
            </div>
        </div>
    </div>
    <!-- Quote End -->
	
	
	
	
	
	
	
	
	
	
	
                   <?php
if(isset($_POST['delete1']))
{
	foreach ($_POST['dlid'] as $key => $value) 
	{	
		$selectid=$value;	
	}
	$query1 = "delete from designorder where id='".$selectid."'";
	mysqli_query($con,$query1) or die(mysqli_error($con));
	echo "<script>
				alert('Deleted...');
			</script>";
	echo "<script> location.href='myorder.php'; </script>";
}
?>


        

    <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
				<div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">About Us</h4>
					<p>
					CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE CYCAKE 
					</p>  
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
					<li><a class="btn btn-link" href="index.php">Home</a></i>
                    <li><a class="btn btn-link" href="about.php">About Us</a></li>
                    <li><a class="btn btn-link" href="product.php">Products</a></li>
                    <li><a class="btn btn-link" href="login.php">Login</a></li>   
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Mangalore</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9090909090</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ;?>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
}
else
{
	echo "<script> location.href='../index.php'; </script>";
}	
?>