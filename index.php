<?php
session_start();

require_once "config.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `login-data` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $username;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Wrong password')</script>";
        }
    } else {
        echo "<script>alert('Email not found')</script>";
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
    <title>Login | Expense Tracker</title>
</head>

<body>
    <main class="auth-page">
        <section class="auth-card">
            <div class="auth-illustration">
                <span class="badge">Smart money planning</span>
                <h1>Manage your expenses with clarity.</h1>
                <p>Track income, monitor spending, and stay on top of your financial goals in one place.</p>

                <div id="login-img">
                    <img src="money.png" alt="login" height="200px">
                </div>

            </div>
            <div class="auth-form">
                <h2>Welcome back</h2>
                <p class="eyebrow">Sign in to access your dashboard.</p>
                <form method="post">
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <button class="btn" name="login" type="submit">Login</button>
                </form>
                <p class="text-link">Don’t have an account? <a class="tracker" href="register.php">Create one</a></p>
            </div>
        </section>
    </main>
</body>

</html>