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

<h1>Dashboard</h1>
<h2>Welcome, <?= $user['name'] ?> </h2>
<form method="POST">
    <button type="submit" name="logout">Logout</button>
</form>

<?php 
include 'partials/footer.php';
?>