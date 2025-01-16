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

?>

<h1>register</h1>
<form method="POST">
    <?php if (!empty($errorMessage)) { ?> 
    <p><?=$errorMessage?></p>
    <?php } ?>

    <label for="name">Name:</label><br>
    <input type="text" name="name" placeholder="Name"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="Password"><br>
    <label for="address">Address:</label>
    <input type="text" name="address" placeholder="Address"><br>
    <button type="submit">Register</button>
</form>
<a href="login.php">Login</a>