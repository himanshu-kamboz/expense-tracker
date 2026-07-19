<?php

include "config.php";

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
                <form action="login.php" method="post">

                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <button class="btn" type="submit">Login</button>
                </form>

            </div>

        </div>
    </main>

</body>

</html>