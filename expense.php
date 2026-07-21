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
    <title>Expenses | Expense Tracker</title>
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
                    <li class="active"><a href="expense.php"><i class="fa-solid fa-arrow-trend-down"></i>Expenses</a></li>
                    <li><a href="budget.php"><i class="fa-solid fa-bullseye"></i>Budget</a></li>
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Expense tracker</h2>
                <span class="chip warning">$640 spent this week</span>
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Today</h3>
                    <div class="value">$42</div>
                </div>
                <div class="card">
                    <h3>This month</h3>
                    <div class="value">$1,920</div>
                </div>
                <div class="card">
                    <h3>Pending</h3>
                    <div class="value">3</div>
                </div>
            </section>

            <section class="grid-2">
                <div class="card">
                    <h3>Log an expense</h3>
                    <form class="form-grid">
                        <div class="input-container">
                            <label for="name">Description</label>
                            <input type="text" id="name" placeholder="Groceries, rent, commute">
                        </div>
                        <div class="input-container">
                            <label for="amount">Amount</label>
                            <input type="number" id="amount" placeholder="0.00">
                        </div>
                        <div class="input-container">
                            <label for="category">Category</label>
                            <select id="category">
                                <option>Food</option>
                                <option>Travel</option>
                                <option>Utilities</option>
                                <option>Entertainment</option>
                            </select>
                        </div>
                        <button class="btn" type="button">Save expense</button>
                    </form>
                </div>
                <div class="card table-card">
                    <h3>Latest expenses</h3>
                    <table class="table">
                        <thead>
                            <tr><th>Item</th><th>Amount</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Groceries</td><td>$84</td></tr>
                            <tr><td>Fuel</td><td>$38</td></tr>
                            <tr><td>Streaming</td><td>$14</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>