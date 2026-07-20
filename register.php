<?php

require_once "config.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `login-data`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: dashboard.php");
        exit();
    } else {
        die("MySQL Error: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>

    <main id="container">
        <div id="login-text" class="login">
            <div class="text" id="text-1">
                <h2>Expense <span class="tracker">Tracker</span></h2>
                <p class="eyebrow">
                    Track your expenses and manage your finances effectively with our user-friendly expense tracker application.
                </p>
            </div>
            <div id="login-img">
                <img src="money.png" alt="login" height="200px">
            </div>
        </div>
        <div id="login-form" class="login">
            <div class="text" id="text-2">
                <h2><span class="tracker">Create </span>Account</h2>
                <p class="eyebrow">
                    Fill all details to get started.
                </p>
            </div>
            <div id="form">
                <form action="register.php" method="post">

                    <div class="input-container">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Full Name" required>
                    </div>

                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="input-container">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required />
                    </div>

                    <button class="btn" name="submit" type="submit">Register</button>
                </form>

            </div>

        </div>
    </main>

</body>

</html>