<?php

include "includes/connection.php";
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="style.css">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">




<style type="text/css">
	.scroll
	{
		
		width:100%;
		height:300px; 
		overflow: scroll;
	}

.table	img{
		width: 45px; 
                height: 45px; 
                object-fit: contain;"
	}



	
		/* popup style */
.bg-modal{
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,0.7);
	
	position: absolute;
	top: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	display: none;
}

.modal-content{
	width: 500px;
	height: 300px;
	background-color: white;
	border-radius: 4px;
	text-align: center;
	padding: 20px;
	position: relative;
}
#popup input {
width: 50%;
display: block;

margin: 15px auto;
}

.close{
	position: absolute;
	top 0;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
}


		/* edit popup style */
.bg-modal2{
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,0.7);
	
	position: absolute;
	top: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	display: none;
}

.modal-content2{
	width: 500px;
	height: 350px;
	background-color: white;
	border-radius: 4px;
	text-align: center;
	padding: 20px;
	position: relative;
}
#popup input {
width: 50%;
display: block;

margin: 15px auto;
}

.close2{
	position: absolute;
	top 0;
	right: 14px;
	font-size: 42px;
	transform: rotate(45deg);
	cursor: pointer;
}



.wrapper
		{
			width: 300px;
			margin:0 auto;
			background-color: white;
			color: black
			;	
		}


</style>
</head>
<body>

<?php
include "includes/owner_header.php";
?>




<!-- 3rd head ends-->

</div>


		<div class="" id="">
			<div class="box" style="width: 100%;">
				
<div class="container" style="width: 100%;background-color: white;"> 
	<div class="wrapper">
	
							<?php

		if(isset($_POST['submit1']))
		{
			?>

			<script type="text/javascript">
				window.location="edit.php";
			</script>

			<?php

		}

		?>


		<?php

		$q=mysqli_query($db,"select * from user where Uname='$_SESSION[login_user]';");
		?>
		<legend>
			<h2 style="text-align: center;">My Profile</h2>
		</legend>		

		<?php

		$row=mysqli_fetch_assoc($q);

		echo "<div style='text-align:center'>
		<img class='img-circle profile_img' height=110 width=120 src='../img/".$row['pic']."'>
		</div>";
		

		?>

		<div style="text-align: center;">
			<h2 style="color:mediumseagreen; "><b>Welcome</b></h2>
			<h3 style="color:slateblue; ">
				<b><?php echo $_SESSION['login_user']; ?></b>
			</h3>
		</div>

		<br>

		<?php
		echo "<b>";
		echo "<table class='table table-bordered' style='width=100%;'>";

		echo "<tr>";
		echo "<td>";
		echo "<b> User ID: </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Uid'];
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "<b> User Name </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Uname'];
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "<b> Phone: </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Phone'];
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "<b> Email: </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Email'];
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "<b> Address: </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Address'];
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>";
		echo "<b> Position: </b> ";
		echo "</td>";

		echo "<td>";
		echo $row['Position'];
		echo "</td>";
		echo "</tr>";

		echo "</table>";
		echo "</b>";
		?>

		<div  align="center">
							
							
							<a href="#" class="btn btn-primary" id="edit_pass" style="background-color: green;">Change Password <i class="fa fa-pencil-square-o"></i></a>	

							<br> <br>
							
						</div>


</div>
</div>

</div>
</div>

<footer>
	<?php
	include "includes/shop_footer.php";
	?>
</footer>

<div class="bg-modal2">
			<div class="modal-content">
				<div class="close">
					+
				</div>


				<form action="" id="popup" method="POST">
					<input type="password" name="old_pass" id="old_pass" placeholder="Enter Old Password" required>
					<input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password" required>
					<input type="password" name="con_pass" id="con_pass" placeholder="Confirm New Password" required>
					
					
		<button class="btn btn-default" type="submit" name="changePass" class="fa fa-send-o" style="background-color: red;color: white;">Submit</button>
				</form>

			</div>
		</div>




<?php
if (isset($_POST['changePass']))
{
	mysqli_query($db,"select * from `user` ' WHERE `Uid`='$_SESSION[login_id]';");
	if($_POST[old_pass]==$row['Password']){

			$pass=$_POST['new_pass'];
	$con=$_POST['con_pass'];

	if($pass==$con){
				mysqli_query($db,"UPDATE `user` SET `Password`='$pass' WHERE `Uid`='$_SESSION[login_id]';");
				?>
<script type="text/javascript">
	alert("Password update successfully");
</script>

<?php			
			}

			else 
			{
				?>
<script type="text/javascript">
	alert("Confirm Password Does not matched");
</script>

<?php
			}
	}
	else{
		?>
<script type="text/javascript">
	alert("Old Password does not matched");
</script>

<?php
	}
}
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	

	

document.getElementById('edit_pass').addEventListener('click',function(){
document.querySelector('.bg-modal2').style.display='flex';

});
document.querySelector('.close').addEventListener('click',function(){
		document.querySelector('.bg-modal2').style.display='none';

	});	

	</script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>



