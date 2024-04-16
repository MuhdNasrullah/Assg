<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = $conn->prepare($sql)) {  
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashed_password);
            if ($stmt->fetch()) {
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    header("location: form.php");
                    exit;  
                } else {
                    echo "Invalid username or password.";
                }
            }
        } else {
            echo "Invalid username or password.";
        }
        $stmt->close();
    }
    $conn->close();  
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>