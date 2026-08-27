<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
    
    <!-- <?php
echo password_hash("admin1", PASSWORD_DEFAULT);
?> 
<!-- hashi lõpp -->

<?php include('config.php'); ?>
<?php
    
	  //kontrollime kas väljad on täidetud
	if (!empty($_POST['login']) && !empty($_POST['pass'])) {
		//eemaldame kasutaja sisestusest kahtlase pahna
		$login = htmlspecialchars(trim($_POST['login']));
		$pass = htmlspecialchars(trim($_POST['pass']));

        $paring = "SELECT * FROM users WHERE email='$login'";
		$valjund = mysqli_query($yhendus, $paring);
        $rida = mysqli_fetch_row($valjund);
        $pass2=$rida[6];
    
		
		$hashed_password = password_verify($pass, $pass2);
       
        if ($hashed_password == true ){
    $_SESSION['user_id'] = $rida[0];
    $_SESSION['staatus'] = $rida[1];
    $_SESSION['tuvastamine'] = $rida[1];

    if ($rida[1] == "Admin") {
        header('Location: admin.php');
    } else {
        header('Location: index.php');
    }
    exit();
}
else {
    echo '<div class="alert alert-danger" role="alert">
    Vale kasutajanimi või parool!
    </div>';
}
        }
       
    
?>

<main>
    <h1>Login</h1>
    <form action="" method="post">
        <div>
            <label for="login">Login:</label>
            <input value="juri.juurikas@gmail.com" type="text" name="login" id="login">
        </div>
        <div>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <div>
            <input type="submit" value="Logi sisse">
        </div>
        <div>
            <a href="adduser.php">Register</a>
        </div>
    </form>
</main>
    
</main>
</body>
</html> 