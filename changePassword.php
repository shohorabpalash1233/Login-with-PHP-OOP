<?php 
	session_start();
	require_once 'functions.php';
    $user = new LoginRegistration();

    $uid = $_SESSION['uid'];


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
					$old_pass 		= $_POST['old_password'];
					
					$new_pass 	  	= $_POST['new_password'];
					$confirm_pass   = $_POST['confirm_password'];
}
					if(empty($old_pass) or empty($new_pass) or empty($confirm_pass)){
						echo "<span style='color: #e53d37;'>Field must not be empty</span>";
				}else if($new_pass != $confirm_pass){
						echo "<span style='color: #e53d37;'>Password does not match</span>";
				}else{
					$old_pass 		= md5($_POST['old_password']);
					
					$new_pass 	  	= md5($_POST['new_password']);

					$passUpdate = $user->updatePassword($uid, $new_pass, $old_pass);
				}
			 ?>
		</p>
		
		<div class="login_reg">
			<form action="" method="post" name="reg">
				<table>
					<tr>
						<td>Old Password:</td>
						<td><input type="password" name="old_password" placeholder="Enter Old Password"></td>
					</tr>

					

					<tr>
						<td>New Password:</td>
						<td><input type="password" name="new_password" placeholder="Enter New Password"></td>
					</tr>

					<tr>
						<td>Confirm New Password:</td>
						<td><input type="password" name="confirm_password" placeholder="Re-Enter New Password Again"></td>
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