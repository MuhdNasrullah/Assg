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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $matricNo = $_POST['matricNo'];
    $currentAddress = $_POST['currentAddress'];
    $homeAddress = $_POST['homeAddress'];
    $email = $_POST['email'];
    $mobilePhone = $_POST['mobilePhone'];
    $homePhone = $_POST['homePhone'];
    $Password = $_POST['Password'];
    
    

    // Insert data into the database
    $sql = "INSERT INTO form (name, matricNo, currentAddress, homeAddress, email, mobilePhone, homePhone, Password)
            VALUES ('$name', '$matricNo', '$currentAddress', '$homeAddress', '$email', '$mobilePhone', '$homePhone', '$Password')";
            
            $hash_pass = Password_hash($Password, PASSWORD_DEFAULT);

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
