

// print_r($_POST);

// if (empty($_POST["name"]) && $_POST['name'] === '') {
//     die("Name is required");
// }

// if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
//     die("Valid email is required");
// }

// if (strlen($_POST["password"]) < 8) {
//     die("Password must be at least 8 characters");
// }

// if (!preg_match("/[a-zA-Z]/", $_POST["password"])) {
//     die("Password must contain at least one letter");
// }

// if (!preg_match("/[0-9]/", $_POST["password"])) {
//     die("Password must contain at least one number");
// }

// $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
// echo $password_hash. "<br>";
// $login = password_verify('password1', $password_hash);
// if ($login) echo "<h1>logged in successfully</h1>";
// // Assuming database.php contains the database connection code
// $mysqli = require __DIR__ . "/database.php";
// For debugging purposes, let's output the password hash
<?php
// Prevent direct script execution
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    die("Access denied");
}

// Validate inputs
if (empty($_POST["name"])) {
    die("Name is required");
}

if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

$password = $_POST["password"];
if (strlen($password) < 8 || !preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
    die("Password must be at least 8 characters and contain at least one letter and one number");
}

// Hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Example of password verification (replace 'password1' with the actual password)
$login = password_verify('password1', $password_hash);
if ($login) {
    echo "<h1>Logged in successfully</h1>";
} else {
    echo "<h1>Incorrect password</h1>";
}

// Assuming database.php contains the database connection code
$mysqli = require __DIR__ . "/database.php";
// For debugging purposes, let's output the password hash
echo $password_hash;
?>

