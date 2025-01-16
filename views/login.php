<?php
session_start();
require_once '../helpers/auth_helper.php';
requireGuest();
?>

<h1>Login</h1>
<form method="POST">
    <label for="phone">Phone:</label><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
<a href="register.php">Register</a>