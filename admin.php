<?php include("config.php"); ?>


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
  <body>
    
  
<!-- menuu -->
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
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
           
<form action="adminlogout.php">
<form action="adminlogout.php">
<div class="d-grid gap-2  d-md-flex justify-content-md-end">
  <button class="btn btn-outline-secondary me-md-2" type="submit"></a>Logout</button>
</div>
</form>
    </div>
  </div>
</nav>
<!-- menu -->


 <!-- table -->
  <div class="container my-5">
    <div class="row">
        <p class=" fs-2 fw-bold">Autod</p>
         <p class=" text-body-secondary">
  Halda autopoe nimekirja.
</p>  
    
    </div>
    <div class="col  p-4">
    <a class="  text-end btn btn-secondary btn-sm" href="admin_addcar.php">Lisa auto </a>
    </div>
    <div class="row"></div>

<?php
$paring = 'SELECT * FROM cars'; 
$paring .= ' LIMIT 8';
$valjund = mysqli_query($yhendus, $paring);

 

?>

<table class=" shadow table">
  <thead>
    <tr class="table-light border border-secondary">
      <th scope="col">Pilt</th>
      <th scope="col">Auto</th>
      <th scope="col">Mootor</th>
      <th scope="col">Kütus</th>
      <th scope="col">Hind</th>
      <th scope="col">Kirjeldus</th>
      <th scope="col">Tegevused</th>
    </tr>
  </thead>
  <tbody>
    <?php
while($rida = mysqli_fetch_row($valjund)){ 
    ?>
    <tr>
      <th scope="row"><img src="https://loremflickr.com/50/40/<?php  echo $rida[1] ?>" class="card-img-top " alt="auto"></th>
      <td><?php  echo $rida[1] ?></td>
      <td><?php  echo $rida[3] ?></td>
      <td><?php  echo $rida[4] ?></td>
      <td><?php  echo $rida[5] ?></td>
      <td style="max-width:150px;"> <?php  echo $rida[10] ?></td>
<!-- button delete ja muuda -->
      <td><div class=" d-md-flex btn-group justify-content-md-end" role="group" aria-label="Basic outlined example">
 <a href="admin_modifyauto.php?id=<?php echo $rida[0]; ?>" class="btn btn-outline-primary btn-sm">Muuda</a>


 <a class="btn btn-outline-danger" href="kustuta_auto.php?del_id=<?php  echo$rida[0]; ?>" onclick="return confirm('Are you sure you want to Remove?');">Remove</a>


</div></td>
    </tr>
    <?php
}
?>
  </tbody>
</table>
</div>
</div>
<!-- table end -->






</div>

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
</script>
</body>
</html>