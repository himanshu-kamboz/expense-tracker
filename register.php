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
    $sql = "INSERT INTO `login-data`(`name`, `email`, `password`) VALUES ('$name','$email','$hashedPassword')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Register | Expense Tracker</title>
</head>

<body>
    <main class="auth-page">
        <section class="auth-card">
            <div class="auth-illustration">
                <span class="badge">Start fresh</span>
                <h1>Create your personal finance workspace.</h1>
                <p>Join thousands of users managing their money with smart budgeting and reporting tools.</p>

                <div id="login-img">
                    <img src="money.png" alt="login" height="200px">
                </div>

            </div>
            <div class="auth-form">
                <h2>Create account</h2>
                <p class="eyebrow">Fill in a few details to begin.</p>
                <form action="register.php" method="post">
                    <div class="input-container">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your full name" required>
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a password" required>
                    </div>
                    <div class="input-container">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
                    </div>
                    <button class="btn" name="submit" type="submit">Register</button>
                </form>
                <p class="text-link">Already have an account? <a class="tracker" href="index.php">Login</a></p>
            </div>
        </section>
    </main>
</body>

</html>