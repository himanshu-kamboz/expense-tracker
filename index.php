<?php

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>

<body>

    <main id="container">
        <div id="login-text" class="login">
            <div id="text-1">
                <h1>Expense Tracker</h1>
                <p>
                    Track your expenses and manage your finances effectively with our user-friendly expense tracker application. Sign in to get started and take control of your spending habits today.
                </p>
            </div>
            <div id="login-img">
                <img src="money.png" alt="login">
            </div>
        </div>
        <div id="login-form" class="login">
            <div id="text-2">
                <h2>Welcome Back</h2>
                <p>
                    login your account.
                </p>
            </div>
            <div id="form">
                <form action="login.php" method="post">

                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>

                    <button type="submit">Login</button>
                </form>

            </div>

        </div>
    </main>

</body>

</html>