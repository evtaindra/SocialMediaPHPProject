<?php include ("./CommonFiles/Header.php"); ?>

<div class="container">
    <h1>Logout</h1>
</div>

<?php
// Completely annihilate the session
session_unset();
session_destroy();

// Redirect to Index.php
header("Location: index.php");
die();
?>

<?php include ("./CommonFiles/Footer.php"); ?>