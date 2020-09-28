<?php
	if (isset($_POST['password'])) {
		require_once('../controller/function.php');
		$hashPassword = mdpHash($_POST['password']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>mdp hash</title>
</head>
<body>
	<h1>Fonction de hash de mdp</h1>
	<form action="createmdp.php" method="post">
		<input type="text" name="password">
		<input type="submit" name="submit">
	</form>
	<?php if (isset($hashPassword)) {
		echo $hashPassword;
	} ?>
</body>
</html>