<?php

session_start();

session_destroy();

error_reporting(0);

if($_SESSION['message']){

	$message=$_SESSION['message'];

	echo  "<script type='text/javascript'> 
	alert('$message');
	</script>";
}

$host="localhost";

$user = "root";

$password ="";

$db = "student";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);






?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<nav >
	<label class="logo">Gisire School</label>
	<ul class="">
		<li><a href="">Home</a></li>
		<li><a href="">Contact</a></li>
		<li><a href="">Admission</a></li>
		<li><a href="login.php" class="btn btn-success">Login</a></li>
	</ul>
</nav>

<div class="section1">
	<label class="img_text">We Teach Students With Care</label>
	<img class="main_img" src="school1.jpg">
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img class="class_img" src="class.jpg">
		</div>
		<div class="col-md-8">
			<h1>Welcome to Our School</h1>
			<p>The transformative learning experiences at Gisire academy website are designed to help our students grow both in and out of the classroom. Established in 2005, Gisire academy school is located in Kenya specifically Migori county Ntimaru area and reflects the vibrant energy of the area. Our passionate and skilled team members are here to help our students make an impact on the world. Are you ready to reach your potential? Join us!</p>
		</div>
	</div>
</div>

<center>
	<h1>Our Teachers</h1>
</center>

<div class="container">
	<div class="row">
		
		<?php

            while($info=$result->fetch_assoc())
            {


		?>
		<div class="col-md-4">
			<img class="teacher" src="<?php echo "{$info['image']}"?> ">
			<h3> <?php echo "{$info['name']}"?> </h3>
			<h5> <?php echo "{$info['description']}"?> </h5>
		</div>
      
            <?php 

              }
            
            ?>
		
		<!-- <div class="col-md-4">
			<img class="teacher" src="13.jpg">
			<p>We are dedicated at providing well researched and the best in the class curriculum for our pupils.</p>
		</div>

		<div class="col-md-4">
			<img class="teacher" src="15.jpg">
			<p>Offering a safe and secure family environment on a full, weekly or flexi boarding arrangement, we offers students the opportunity</p>
		</div> -->




	</div>
</div>



<center>
	<h1>Our Courses</h1>
</center>

<div class="container">
	<div class="row">
		
		<div class="col-md-4">
			<img class="course" src="ccna.jpeg">
			<p>Implementing and Administering Cisco Solutions (CCNA) v1.0 </p>
		</div>

		<div class="col-md-4">
			<img class="course" src="hacking.jpeg">
			<p>Computer Hacking Forensic Investigator (CHFI).</p>
		</div>

		<div class="col-md-4">
			<img class="course" src="oracle.jpeg">
			<p>Oracle Database 19c: Administration</p>
		</div>
	</div>
</div>


<center>
	<h1 class="adm">Admission Form</h1>
</center>


<div align="center" class="admission_form">

	<form action="data_check.php" method="POST">

		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="name">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="email">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="number" name="phone">
		</div>

		<div class="adm_int">
			<label class="label_text">Message</label>
			<textarea class="input_txt" name="message"></textarea>
		</div>

		<div class="adm_int">
			<input class="btn btn-primary" type="submit" id="submit" value="apply" name="apply">
		</div>

	</form>
</div>

<footer>
	<h3 class="footer_text">All &#169;copyright 2022 designed by PMWITABIZ</h3>
</footer>

</body>
</html>