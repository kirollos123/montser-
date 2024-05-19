<?php
$host="localhost";
$dbname="login_db";
$username="root";
$password="";
$mysql=new mysqli(  hostname:$host,
                    username:$username,
                    password:$password,
                    database: $dbname);
if ($mysql-> connect_errno){
    die("connecation error:".$mysql->connect_error);
}  


$conn = mysqli_connect("localhost", "root", "", "login_db");

$username = $_POST["name"]; // Assuming username comes from a form
$email = $_POST["email"]; // Assuming email comes from a form
$password = $_POST["password"]; // Assuming password comes from a form

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters to the prepared statement
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

// Execute the statement
mysqli_stmt_execute($stmt);

// Check if the insertion was successful
if(mysqli_stmt_affected_rows($stmt) > 0) {
    echo "User registered successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);


return $conn;       