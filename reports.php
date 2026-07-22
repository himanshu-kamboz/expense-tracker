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
    <title>Reports | Expense Tracker</title>
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
                    <li class="active"><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Financial reports</h2>
                <span class="chip success">Updated today</span>
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Spending trend</h3>
                    <div class="value">-8%</div>
                </div>
                <div class="card">
                    <h3>Savings rate</h3>
                    <div class="value">36%</div>
                </div>
                <div class="card">
                    <h3>Goal progress</h3>
                    <div class="value">72%</div>
                </div>
            </section>

            <section class="card">
                <h3>Monthly summary</h3>
                <p>Your savings reached a healthy level this month. You are staying under your planned category limits.</p>
                <div class="empty-state">Charts and deeper analysis can be added here once your data grows.</div>
            </section>
        </main>
    </div>
</body>
</html>