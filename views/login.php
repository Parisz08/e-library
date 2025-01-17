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

<main class="bg-light p-5 shadow rounded-4 d-flex flex-column gap-3"> 
    <h1 class="text-center fs-1 fw-bold text-primary">Login</h1>
    <form method="POST">
        <?php if (!empty($errorMessage)) { ?> 
            <p><?=$errorMessage?></p>
            <?php } ?>
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" placeholder="Phone"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
        <a href="register.php">Register</a>
</main>

<?php
include 'partials/footer.php';
?>