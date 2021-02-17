<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet">
  <title>Article List</title>
</head>

<body>
<script>
$(document).ready(function(){
  $('#myInput').on('keyup',function(){
    var value = $(this).val().toLowerCase;
    $('#myTable tr').filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
    });
  });
});

</script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Panel</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <form class="d-flex mx-3 ">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="myInput">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
          <li class="nav-item">
            <?php
            if ($this->session->userdata('id')) {
            ?>
          <li> <a href="<?php echo base_url('Admin/logout'); ?>" class='btn btn-light'>Logout</a></li>
        <?php
            }
        ?>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  if ($error = $this->session->flashdata('login_failed')) {
    echo '<div class="alert alert-danger">' . $error . '</div>';
  }
  ?>
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>

</html>