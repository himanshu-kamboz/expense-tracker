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
    <title>Budget | Expense Tracker</title>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div>
                <div class="logo">
                    <i class="fa-solid fa-wallet"></i>
                    <div>
                        <h2>Expense</h2>
                        <span>Tracker</span>
                    </div>
                </div>
                <ul class="nav-links">
                    <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                    <li><a href="income.php"><i class="fa-solid fa-arrow-trend-up"></i>Income</a></li>
                    <li><a href="expense.php"><i class="fa-solid fa-arrow-trend-down"></i>Expenses</a></li>
                    <li class="active"><a href="budget.php"><i class="fa-solid fa-bullseye"></i>Budget</a></li>
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Budget plan</h2>
                <span class="chip success">On track</span>
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Set budget</h3>
                    <div class="value">$2,500</div>
                </div>
                <div class="card">
                    <h3>Used</h3>
                    <div class="value">$1,950</div>
                </div>
                <div class="card">
                    <h3>Remaining</h3>
                    <div class="value">$550</div>
                </div>
            </section>

            <section class="card">
                <h3>Category progress</h3>
                <div class="progress-list">
                    <div class="progress-row">
                        <div class="page-header"><strong>Housing</strong><span>$1,200 / $1,500</span></div>
                        <div class="progress-bar"><span style="width:80%"></span></div>
                    </div>
                    <div class="progress-row">
                        <div class="page-header"><strong>Food</strong><span>$320 / $500</span></div>
                        <div class="progress-bar"><span style="width:64%"></span></div>
                    </div>
                    <div class="progress-row">
                        <div class="page-header"><strong>Entertainment</strong><span>$180 / $300</span></div>
                        <div class="progress-bar"><span style="width:60%"></span></div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>