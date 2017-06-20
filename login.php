<?php 
	session_start();
    require_once 'functions.php';
    $user = new LoginRegistration();
    if($user->getSession()){
    	header('Location: index.php');
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
			<h2>Login</h2>
		

		<p class="msg">
			<span class="login_msg">
				
				<?php
					if(isset($_GET['response'])){
						if($_GET['response'] == '1'){
							echo "Logout Successfully";
						}
					}
				?>
			</span>
			<?php 
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$email = $_POST['email'];
					$password = $_POST['password'];
				}
				if(empty($email) or empty($password)){
					echo "Field must not be empty";
				}else{
					$password = md5($password);
					$login = $user->loginUser($email, $password);
					if($login){
						header('Location: index.php');
					}else{
						echo "Email and Password do not match";
					}
				}
			 ?>
		</p>

		<div class="login_reg">
			<form action="" method="post">
				<table>

					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" placeholder="Enter email"></td>
					</tr>
					

					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" placeholder="Enter password"></td>
					</tr>

					

					

					

					<tr>
						<td></td>
						<td colspan="2">

							<input type="submit" name="login" value="Login">
							<input type="reset" name="" value="Reset">

						</td>
					</tr>
				</table>
			</form>
		</div>
		
		<div class="back">
			<a href="login.php">Back</a>
		</div>
	</div>
		<div class="footer">
			<h3>www.google.com</h3>
		</div>

	</div>
</body>
</html>