<?php
session_start();
// session_destroy();
require_once '../helpers/auth_helper.php';
requireAuth();


$user = $_SESSION['user'];

if (isset($_POST['logout'])) {
  require_once '../controllers/AuthController.php';
  $authController = new AuthController();
  $authController->logout();
}

include 'partials/header.php';
?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand fw-bold fs-3 text-primary" href="#">
      <img src="../assets/library-svgrepo-com.svg" alt="Logo" width="36" height="36" class="d-inline-block align-text-top">
      e-Library
    </a>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmLogout">
      Logout
    </button>

    <div class="modal fade" id="confirmLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Are sure?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>are you sure you want to logout</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method="POST">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</nav>

<main class="row m-0">
  <div id="carouselExampleAutoplaying" class="carousel slide col-12 col-lg-8 p-0" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/carousel/perpus 5.jpg" class="d-block w-100" alt="gambar-1">
      </div>
      <div class="carousel-item">
        <img src="../assets/carousel/perpus 2.jpg" class="d-block w-100" alt="gambar-2">
      </div>
      <div class="carousel-item">
        <img src="../assets/carousel/perpus 3.jpg" class="d-block w-100" alt="gambar-3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="row row-cols-2 row-cols-lg-1 col-12 col-lg-4 p-0 m-0">
    <div class="col bg-secondary d-flex flex-column align-items-start justify-content-end p-4">
      <h2>Welcome, <?= $user['name'] ?> </h2>
      <button class="btn btn-teal fs-4">Go To profile</buttonc>
    </div>
    <div class="col bg-warning p-4 d-flex flex-column align-items-end justify-content-end">
      <h2>Explore our Catalogue</h2>
      <button class="btn btn-teal fs-4">Explore</button>
    </div>
  </div>
</main>

<?php
include 'partials/footer.php';
?>