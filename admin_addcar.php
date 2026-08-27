<?php include("config.php"); ?>


<!-- <?php
	session_start();
	if ($_SESSION['tuvastamine'] !== 'Admin') {
	  header('Location: adminlogin.php');
	  exit();
	  }
    ?> -->


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
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
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
<!-- menu -->




 <!-- table -->
  <div class="container my-5">
    <div class="row">
        <h2>Lisa auto</h2>
        </div>
        

<div class="card shadow p-4">
<form action="admin_addcar.php" method="GET" enctype="multipart/form-data">

<?php
    if(!empty($_GET["mark"]) && !empty($_GET["mudel"])  && !empty($_GET["hind"]) && !empty($_GET["kütus"]) && !empty($_GET["aasta"]) && !empty($_GET["transmission"]) && !empty($_GET["seats"]) && !empty($_GET["description"]) && !empty($_GET["mootor"]) && !empty($_GET["pilt"])){
        $mark= $_GET["mark"];
        $mudel= $_GET["mudel"];
        $hind= $_GET["hind"];
        $kütus= $_GET["kütus"];
        $aasta= $_GET["aasta"];
        $transmission= $_GET["transmission"];
        $seats= $_GET["seats"];
        $description= $_GET["description"];
        $mootor= $_GET["mootor"];
        $pilt= $_GET["pilt"];
        
  $paring = "INSERT INTO cars (mark, model, engine, fuel, price, image, year, transmission, seats, description, status) 
  VALUES ('".$mark."', '".$mudel."', '".$mootor."', '".$kütus."', '".$hind."', '".$pilt."', '".$aasta."', '".$transmission."', '".$seats."', '".$description."', '')";
  
if($result= mysqli_query($yhendus, $paring)) {
	$result = 'Data saved';
    header('Location: admin.php');
} else {
	$result = 'No data saved';
}
	
$affected = mysqli_affected_rows($yhendus);
	
	echo $result . '.' . ' Affected rows: ' . $affected;
	

    }
?>
    <div class="row">
        
        <!-- vasak pool -->
        <div class="col-md-6">
            
            <div class="mb-3">
                <label class="form-label">Mark</label>
                <input type="text" name="mark" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mootor</label>
                <input type="text" name="mootor" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hind (€ / päev)</label>
                <input type="number" min="0.01" step="0.01" name="hind" class="form-control" required>
            </div>
         <div class="mb-3">
                <label class="form-label">Mudel</label>
                <input type="text" name="mudel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kütus</label>
                <select name="kütus" class="form-select" required>
                    <option value="">Vali</option>
                    <option value="Bensiin">Bensiin</option>
                    <option value="Diisel">Diisel</option>
                    <option value="Hübriid">Hübriid</option>
                    <option value="Elektriline">Elektriline</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Auto pilt</label>
                <input type="file" name="pilt" class="form-control" accept=".jpg,.png,.webp" required>
                
            </div>

        </div>

       <!-- parem pool -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Aasta</label>
                <input type="text" name="aasta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Käigukast</label>
                <input type="text" name="transmission" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Istmekohad</label>
                <input type="number" step="1" min="1" max="8" name="seats" class="form-control" required>
            </div>
         <div class="mb-3">
                <label class="form-label">Selgitus</label>
                <input type="text" name="description" class="form-control" required>
            </div>

        </div>
    </div>
    <hr>
<!-- nupud -->
    
    <input  class="btn btn-dark" type="submit" value="Salvesta">
    <input  class="btn btn-danger" type="reset" value="Tühjenda">

</form>
</div>


</div>










</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
</script>
</body>
</html>