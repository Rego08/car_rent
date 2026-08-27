<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>

<?php include('config.php'); ?>
<?php
session_start();

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $password_hash = password_hash($pass, PASSWORD_DEFAULT);
    $timestamp = date('Y-m-d');

    $paring = "INSERT INTO users (role, first_name, last_name, email, phone, password_hash, timestamp) VALUES ('User', '$first_name', '$last_name', '$email', '$phone', '$password_hash', '$timestamp')";
    $valjund = mysqli_query($yhendus, $paring);

    if ($valjund) {
        header('Location: adminlogin.php');
        exit();
    }
}
?>

<main>
    <h1>Register</h1>
    <form action="" method="post">
        <div>
            <label for="first_name">Eesnimi:</label>
            <input type="text" name="first_name" id="first_name">
        </div>
        <div>
            <label for="last_name">Perekonnanimi:</label>
            <input type="text" name="last_name" id="last_name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="phone">Telefon:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="pass">Parool:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <div>
            <input type="submit" value="Loo konto">
        </div>
        <div>
            <a href="adminlogin.php">Login</a>
        </div>
    </form>
</main>

</body>
</html>