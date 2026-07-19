<?php

include "config.php";

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `login-data` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            header("Location: dashboard.php");
            exit();
        } else {

            echo "Wrong Password";
        }
    } else {

        echo "Email Not Found";
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
    <title>login</title>
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
                <h2><span class="tracker">Welcome </span>Back</h2>
                <p class="eyebrow">
                    login your account.
                </p>
            </div>
            <div id="form">
                <form method="post">

                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="email" name="email" placeholder="Username" required>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <button class="btn" name="login" type="submit">Login</button>
                </form>

            </div>

            <div id="register-now">
                <p>Don't have an account.? <a class="tracker" href="register.php">Register Now</a></p>
            </div>

        </div>
    </main>

</body>

</html>