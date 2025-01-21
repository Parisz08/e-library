<?php
session_start();
require_once '../helpers/auth_helper.php';
requireGuest();

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $errorMessage = $authController->login($_POST['phone'], $_POST['password']);
}

include 'partials/header.php';
?>

<main class="bg-light d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="bg-light p-5 shadow rounded-4 d-flex flex-column gap-3 mw-100" style="min-width: 400px"> 
        <h1 class="text-center fs-1 fw-bold text-primary">Login</h1>
        <form method="POST">
            <?php if (!empty($errorMessage)) { ?> 
                <p><?=$errorMessage?></p>
                <?php } ?>
                
                <div class="form-floating mb-3">
                    <input type="tel" name="phone" class="form-control" id="floatinginput" placeholder="Phone Number">
                    <label for="floatingInput">Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="text-center text-secondary">
                Already have an account?
                <a href="register.php">Register</a>
            </p>
        </div>
    </main>

<?php
include 'partials/footer.php';
?>