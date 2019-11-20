<?php 
	require_once 'koneksi.php';
	session_start();
	error_reporting(0);
	if($_SESSION['user']!=''){
		header("location:dashboard.php");
		exit();
	}else{
		unset($_SESSION['user']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="user" placeholder="Username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="pass" placeholder="Password" required></td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" name="login">LOGIN</button></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$q = mysqli_query($konek,"SELECT * FROM user WHERE username = '$user' AND password = '$pass'");

		if (!$q) {
			header("Refresh:0; url=index.php", true, 303);
			exit();
		} else {
			$data = $q->fetch_assoc();
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['user'] = $data['username'];
			header("Refresh:0; url=dashboard.php", true, 303);
			exit();
		}
		mysqli_close();
	}
?>