<?php

require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <aside class="sidebar">

        <div class="logo">
            <i class="fa-solid fa-wallet"></i>
            <div>
                <h2>Expense</h2>
                <span>Tracker</span>
            </div>
        </div>

        <ul class="nav-links">

            <li class="active">
                <a href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="income.php">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    Income
                </a>
            </li>

            <li>
                <a href="expense.php">
                    <i class="fa-solid fa-arrow-trend-down"></i>
                    Expenses
                </a>
            </li>

            <li>
                <a href="budget.php">
                    <i class="fa-solid fa-bullseye"></i>
                    Budget
                </a>
            </li>

            <li>
                <a href="reports.php">
                    <i class="fa-solid fa-chart-pie"></i>
                    Reports
                </a>
            </li>

            <li>
                <a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
            </li>

            <li>
                <a href="settings.php">
                    <i class="fa-solid fa-gear"></i>
                    Settings
                </a>
            </li>

        </ul>

        <a href="logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </aside>
</body>

</html>