<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_info";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the POST request from the registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Encrypt the password

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) { // Corrected from $mysqli to $conn
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close(); // Corrected from $mysqli to $conn
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>