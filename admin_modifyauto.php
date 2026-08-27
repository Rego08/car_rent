<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<style>
	.hero {
		height: 300px;
	}
	</style>
  </head>
  <body class="bg-body-tertiary">

<!-- <?php
	session_start();
	if ($_SESSION['tuvastamine'] !== 'Admin') {
	  header('Location: adminlogin.php');
	  exit();
	  }
    ?> -->


<!-- menuu -->
<nav class="navbar navbar-expand-lg bg-body-light border-bottom">
  <div class="container">
	<a class="navbar-brand fw-bold" href="#">Admin Autorent</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav me-auto mb-2 mb-lg-0">

		<li class="nav-item">
		  <a class="nav-link" href="#">Autod</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link active" aria-disabled="true">Reserveeringud</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link active" aria-disabled="true">Kasutajad</a>
		</li>
	  </ul>
	  <div class="d-grid gap-2 d-md-block">
		<button class="btn btn-primary" type="button">Logout</button>
	  </div>
	</div>
  </div>
</nav>

<!-- php -->
<?php include("config.php"); ?>


<?php

// võta ID GET kaudu
if (!empty($_GET['id'])) {
  $id=$_GET['id'];
  $sql = "SELECT * FROM cars WHERE id=$id";
    $result = mysqli_query($yhendus, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result);
    }
}


// // https://www.w3schools.com/php/php_mysql_select.asp
// // päring auto saamiseks
// $car = null;
// if ($id > 0) {
//     $sql = "SELECT * FROM cars WHERE id=$id";
//     $result = mysqli_query($yhendus, $sql);
//     if ($result && mysqli_num_rows($result) > 0) {
//         $car = mysqli_fetch_assoc($result);
//     }
// }

// kui vorm saadetud, uuenda auto
if (isset($_GET['save']) && $car) {
    $mark = $_GET['mark'];
    $mudel = $_GET['mudel'];
    $mootor = $_GET['mootor'];
    $kütus = $_GET['kütus'];
    $hind = $_GET['hind'];
    $aasta = $_GET['aasta'];
    $transmission = $_GET['transmission'];
    $seats = $_GET['seats'];
    $description = $_GET['description'];

    $update = "UPDATE cars SET 
        mark='$mark',
        model='$mudel',
        engine='$mootor',
        fuel='$kütus',
        price='$hind',
        year='$aasta',
        transmission='$transmission',
        seats='$seats',
        description='$description'
        WHERE id=$id";

    mysqli_query($yhendus, $update);
    header("Location: admin.php");
}
?>
<!-- php lõpp -->



<!-- menu -->


<!-- modify car form -->
<div class="container my-5">
  <div class="row">
	<h2>Muuda auto</h2>
  </div>

  <div class="card shadow p-4">
	<form action="admin_modifyauto.php" method="GET">

	  <input type="hidden" name="id" value="<?=$car['id']?>">

	  <div class="row">

		<!-- vasak pool -->
		<div class="col-md-6">

		  <div class="mb-3">
			<label class="form-label">Mark</label>
			<input type="text" name="mark" class="form-control" value="<?=$car['mark']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Mootor</label>
			<input type="text" name="mootor" class="form-control" value="<?=$car['engine']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Hind (€ / päev)</label>
			<input type="number" name="hind" class="form-control" value="<?=$car['price']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Mudel</label>
			<input type="text" name="mudel" class="form-control" value="<?=$car['model']?>" required>
		  </div>

		</div>

		<!-- parem pool -->
		<div class="col-md-6">

		  <div class="mb-3">
			<label class="form-label">Aasta</label>
			<input type="text" name="aasta" class="form-control" value="<?=$car['year']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Käigukast</label>
			<input type="text" name="transmission" class="form-control" value="<?=$car['transmission']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Istmekohad</label>
			<input type="number" name="seats" class="form-control" value="<?=$car['seats']?>" required>
		  </div>

		  <div class="mb-3">
			<label class="form-label">Selgitus</label>
			<input type="text" name="description" class="form-control" value="<?=$car['description']?>" required>
		  </div>
      <div class="mb-3">
                <label class="form-label" value="<?=$car['fuel']?>" >Kütus</label>
                <select name="kütus" class="form-select" required>
                    <option value="">Vali</option>
                    <option value="Bensiin">Bensiin</option>
                    <option value="Diisel">Diisel</option>
                    <option value="Hübriid">Hübriid</option>
                    <option value="Elektriline">Elektriline</option>
                </select>
            </div>
		</div>

	  </div>

	  <hr>

	  <input class="btn btn-dark" type="submit" value="Salvesta">
	  <a href="admin.php" class="btn btn-secondary">Tagasi</a>

	</form>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>