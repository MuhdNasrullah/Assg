<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
echo "Welcome " . $_SESSION['username'];
?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <form action="submit.php" method="POST" onsubmit="return validateForm()">
      <label for="title">Registration</label>
      <label for="name">Name (Legal/Official):</label>
      <input type="text" id="name" name="name" /><br /><br />

      <label for="matricNo">Matric No:</label>
      <input type="text" id="matricNo" name="matricNo" /><br /><br />

      <label for="currentAddress">Current Address:</label>
      <input
        type="text"
        id="currentAddress"
        name="currentAddress"
      /><br /><br />

      <label for="homeAddress">Home Address:</label>
      <input type="text" id="homeAddress" name="homeAddress" /><br /><br />

      <label for="email">Email (Gmail account):</label>
      <input type="email" id="email" name="email" /><br /><br />

      <label for="mobilePhone">Mobile Phone No:</label>
      <input type="tel" id="mobilePhone" name="mobilePhone" /><br /><br />

      <label for="homePhone">Home Phone No:</label>
      <input type="tel" id="homePhone" name="homePhone" /><br /><br />

      <label for="Password"> Enter Password:</label>
      <input type="Pass" id="Password" name="Password" /><br /><br />

      <input type="submit" value="Submit" /> 
      <br><br>
      <a href="logout.php" class="button">Logout</a>
    </form>
    <script>
      function validateForm() {
        var name = document.getElementById("name").value;
        var matricNo = document.getElementById("matricNo").value;
        var currentAddress = document.getElementById("currentAddress").value;
        var homeAddress = document.getElementById("homeAddress").value;
        var email = document.getElementById("email").value;
        var mobilePhone = document.getElementById("mobilePhone").value;
        var homePhone = document.getElementById("homePhone").value;
        var Password = document.getElementById("Password").value;

        if (name == "") {
          alert("Please enter your name");
          return false;
        }

        if (matricNo == "") {
          alert("Please enter your matric number");
          return false;
        } else if (matricNo.length < 7) {
          alert("Matric number should be at least 7 digits");
          return false;
        }

        if (currentAddress == "") {
          alert("Please enter your current address");
          return false;
        }

        if (homeAddress == "") {
          alert("Please enter your home address");
          return false;
        }

        if (email == "") {
          alert("Please enter your email");
          return false;
        }

        if (mobilePhone == "") {
          alert("Please enter your mobile phone number");
          return false;
        } else if (!/^\d{10,11}$/.test(mobilePhone)) {
          alert("Mobile phone number should be 10 to 11 digits only");
          return false;
        }

        if (homePhone == "") {
          alert("Please enter your home phone number");
          return false;
        } else if (!/^\d{10,11}$/.test(homePhone)) {
          alert("Home phone number should be 10 to 11 digits only");
          return false;
        }

        if (Password == "") {
          alert("Please enter your Password");
          return false;
        } else if (!/^\d{10,11}$/.test(Password)) {
          alert("Password should be 8 to digits only");

        return true;
      }}
    </script>
  </body>
    </html
      