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
    <title>Profile | Expense Tracker</title>
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
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li class="active"><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Profile</h2>
                <span class="chip success">Verified account</span>
            </div>

            <section class="card profile-card">
                <div style="display:flex; align-items:center; gap:16px;">
                    <div class="avatar">JD</div>
                    <div>
                        <h3>Jordan Doe</h3>
                        <p>jordan@example.com</p>
                    </div>
                </div>

                <form class="form-grid">
                    <div class="input-container">
                        <label for="fullName">Full name</label>
                        <input type="text" id="fullName" value="Jordan Doe">
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="jordan@example.com">
                    </div>
                    <button class="btn" type="button">Update profile</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>