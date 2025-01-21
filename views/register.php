<?php
session_start();
require_once '../helpers/auth_helper.php';
requireGuest();

$errorMessage= "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $errorMessage = $authController->register($_POST['name'], $_POST['phone'], $_POST['password'], $_POST['address']);
}

include 'partials/header.php';
?>

<main class="bg-light d-flex flex-column justify-content-center align-items-center vh-100">
<div class="bg-light p-5 shadow rounded-4 d-flex flex-column gap-3 mw-100" style="min-width: 400px">
    <h1 class="text-center fs-1 fw-bold text-primary">register</h1>
    <form method="POST">
        <?php if (!empty($errorMessage)) { ?> 
        <p><?=$errorMessage?></p>
        <?php } ?>
    <div class="form-floating mb-3">
    <input type="tel" name="name" class="form-control" id="floatinginput" placeholder="Name">
    <label for="floatingInput">Name:</label>
    </div>
    
    <div class="form-floating mb-3">
    <input type="tel" name="phone" class="form-control" id="floatinginput" placeholder="Phone Number">
    <label for="floatingInput">Phone:</label>
    </div>
    
    <div class="form-floating mb-3">
    <input type="tel" name="password" class="form-control" id="floatinginput" placeholder="Password">
    <label for="floatingInput">Password:</label>
    </div>
    
    <div class="form-floating mb-3">
    <input type="tel" name="address" class="form-control" id="floatinginput" placeholder="address">
    <label for="floatingInput">Address:</label>
    </div>
    
    <button type="submit" class="btn btn-primary w-100">Register</button>

    <p class="text-center text-secondary">
        </form>
        <a href="login.php">Login</a>
    </p>
</div>
</main>

<?php 
include 'partials/footer.php';
?>