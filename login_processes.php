<?php
// Perform user authentication here. Check the provided username and password against the database.
$username = $_POST['username']; // Get the username from the form
$password = $_POST['password']; // Get the password from the form

if (($username === "dipakja" && $password === "dipak123")||($username==="mahajan" && $password==="2580")) {
    session_start();

    $_SESSION['username'] = $username; // Store the username in the session
    // $_SESSION['password'] = $password; // Store the username in the session
    header("Location: schoolData.php");
    exit();
} else {
    echo "Login failed. Please try again or contact the administrator.";
}

?>

