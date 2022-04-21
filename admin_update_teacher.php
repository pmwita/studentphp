<?php

session_start();

error_reporting(0);

if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
	header("location:login.php");
}

$host="localhost";

$user = "root";

$password ="";

$db = "student";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['teacher_id']){

$t_id=$_GET['teacher_id'];

$sql = "SELECT * FROM teacher WHERE id='$t_id' ";

$result = mysqli_query($data, $sql);

$info =$result->fetch_assoc();

}

if(isset($_POST['update_teacher'])){
	
	$id=$_POST['id'];

	$t_name=$_POST['name'];

	$t_des=$_POST['description'];
	
	$file=$_FILES['image']['name'];
	
	$dst="./image/".$file;

	$dst_db="image/".$file;

	move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    
    if($file)
    {

	$sql2= "UPDATE teacher SET name='$t_name',description='$t_des',image='$dst_db' WHERE id='$id' ";

	  }else{
	 $sql2= "UPDATE teacher SET name='$t_name',description='$t_des' WHERE id='$id' ";

	  }

	$result2=mysqli_query($data, $sql2);

	if($result2){
	
	header("location:admin_view_teacher.php");	
	

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Teacher Data</title>
	<?php

    include 'admin_css.php';

    ?>

    <style type="text/css">
    	label{
    		display: inline-block;
    		width: 100px;
    		text-align: right;
    		padding-top: 10px;
    		padding-bottom: 10px;
    	}
    	.div_deg{
    		background-color: skyblue;
    		width: 500px;
    		padding-bottom: 70px;
    		padding-top: 70px;
    	}
    </style>
</head>
<body>

<?php

include 'admin_sidebar.php';

?>

<div class="content">
	
	<center>

	<h1>Update Teacher Data</h1>
	

<div class="div_deg">
	
<form action="#" method="POST" enctype="multipart/form-data">
	
	<div>
		
	<input type="text" name="id" value="<?php echo "{$info['id']}"; 
    ?>" hidden>

	</div>


	<div>
		<label>Teacher Name</label>
		<input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
	</div>

	<div>
		<label>About Teacher</label>
		<textarea  rows="4" name="description">
			<?php echo "{$info['description']}"; ?>
				
			</textarea>
	</div>

     <div>
		<label>Teacher Old Image</label>
		<img height="100px;" width="100px;" src="<?php echo "{$info['image']}"; ?>">
	</div>

    <div>
		<label>Teacher New Image</label>
		<input type="file" name="image">
	</div>
	 

	<div>
		
		<input class="btn btn-success" type="submit" name="update_teacher" value="update">
	</div>
  </form>

  </div>

 </center>

</div>

</body>
</html>