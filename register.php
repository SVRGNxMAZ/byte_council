<?php
require 'config.php';

if(isset($_POST["submit"])){
  $matric_number = $_POST["matric_number"];
  $password = $_POST["password"];
 
  // Insert the new user data into the database
  $stmt = mysqli_prepare($conn, "INSERT INTO reg_info (email, matric_number, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ss", $email, $matric_number, $password);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script> alert('Login'); </script>";
  }
  mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <style>
      /* Reset default browser styles */
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      /* Set up the page layout */
      body {
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: Arial, sans-serif;
      }

      /* Style the registration form */
      form {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        padding: 20px;
        max-width: 400px;
        width: 100%;
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input[type="text"],
      input[type="password"] {
        padding: 10px;
        border-radius: 5px;
        border: none;
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        width: 100%;
        margin-bottom: 10px;
      }

      button[type="submit"] {
        background-color: #0c7cd5;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      button[type="submit"]:hover {
        background-color: #085a9c;
      }

      /* Style the logo */
      .logo {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: auto;
      }
    </style>
  </head>
  <body>
    <form action="" method="post" autocomplete="off">
      <img src="https://kompleksislam.usim.edu.my/wp-content/uploads/2022/06/logoPI-USIM.png" alt="KOMPLEKS ISLAM USIM Logo" class="logo">
      <h2>Registration</h2>
      <label for="matric_number">Matric number:</label>
      <input type="text" name="matric_number" id="matric_number" required value="" maxlength="7">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required value="">
      <button type="submit" name="submit">Register</button>
    </form>
  </body>
</html>

