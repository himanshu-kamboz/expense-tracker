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
    <title>Dashboard | Expense Tracker</title>
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
                    <li class="active"><a href="dashboard.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                    <li><a href="income.php"><i class="fa-solid fa-arrow-trend-up"></i>Income</a></li>
                    <li><a href="expense.php"><i class="fa-solid fa-arrow-trend-down"></i>Expenses</a></li>
                    <li><a href="budget.php"><i class="fa-solid fa-bullseye"></i>Budget</a></li>
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="topbar">
                <div>
                    <h1>Good morning</h1>
                    <p>Here’s a quick snapshot of your finances.</p>
                </div>
                <span class="chip success">+12% this month</span>
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Net balance</h3>
                    <p>Available after bills</p>
                    <div class="value">$3,280</div>
                </div>
                <div class="card">
                    <h3>Monthly income</h3>
                    <p>Expected this month</p>
                    <div class="value">$5,200</div>
                </div>
                <div class="card">
                    <h3>Monthly expenses</h3>
                    <p>Current spending</p>
                    <div class="value">$1,920</div>
                </div>
            </section>

            <section class="grid-2">
                <div class="card table-card">
                    <div class="page-header">
                        <h2>Recent activity</h2>
                        <a class="tracker" href="reports.php">View all</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Income</td>
                                <td>Salary</td>
                                <td>$2,400</td>
                                <td><span class="badge success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Expense</td>
                                <td>Groceries</td>
                                <td>$84</td>
                                <td><span class="badge warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Expense</td>
                                <td>Travel</td>
                                <td>$120</td>
                                <td><span class="badge success">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card">
                    <h3>Budget health</h3>
                    <div class="progress-list">
                        <div class="progress-row">
                            <div class="page-header"><strong>Housing</strong><span>82%</span></div>
                            <div class="progress-bar"><span style="width:82%"></span></div>
                        </div>
                        <div class="progress-row">
                            <div class="page-header"><strong>Food</strong><span>58%</span></div>
                            <div class="progress-bar"><span style="width:58%"></span></div>
                        </div>
                        <div class="progress-row">
                            <div class="page-header"><strong>Fun</strong><span>35%</span></div>
                            <div class="progress-bar"><span style="width:35%"></span></div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>