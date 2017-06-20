<?php 
	session_start();
	require_once 'functions.php';
    $user = new LoginRegistration();

    $uid = $_SESSION['uid'];
    $username = $_SESSION['uname'];

    // if(isset($_REQUEST['id'])){
    // 		$id = $_REQUEST['id'];
    // 	}else{
    // 		header('Location: index.php');
    // 		exit();
    // 	}

    if(!$user->getSession()){
    	header('Location: login.php');
    	exit();


    }
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h3>PHP OOP Login Register System</h3>
		</div>

		<div class="mainmenu">
			<ul>
				<?php if($user->getSession()){?>
				<li><a href="index.php">Home</a></li>
				<li><a href="changePassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php }else{ ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<?php } ?>
			</ul>
		</div>


		<div class="content">
			<h2>Update Your Profile</h2>

		<p class="msg">
			<?php 
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$username = $_POST['username'];
					
					$name 	  = $_POST['name'];
					$email    = $_POST['email'];
					$website  = $_POST['website'];

					if(empty($username) or empty($name) or empty($email) or empty($website)){
						echo "<span style='color: #e53d37;'>Field must not be empty</span>";
					}else{
						$update = $user->updateUser($uid, $username, $name, $email, $website);
						if($update){
							echo "Information has been updated successfully";
						}
					}
				}
			 ?>
		</p>
		
		<?php
			$result = $user->getUserDetails($uid);
			foreach ($result as $row) {
				
			
		?>
		<div class="login_reg">
			<form action="" method="post" name="reg">
				<table>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" value="<?php echo $row['username']?>"></td>
					</tr>

					

					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?php echo $row['name']?>"></td>
					</tr>

					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" value="<?php echo $row['email']?>"></td>
					</tr>

					<tr>
						<td>Website:</td>
						<td><input type="text" name="website" value="<?php echo $row['website']?>"></td>
					</tr>

					<tr>
						<td></td>
						<td colspan="2">

							<input type="submit" name="update" value="Update">
							<input type="reset" name="" value="Reset">

						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<?php } ?>

		<div class="back">
			<a href="index.php">Back</a>
		</div>
	</div>
		<div class="footer">
			<h3>www.google.com</h3>
		</div>

	</div>
</body>
</html>