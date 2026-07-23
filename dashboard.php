<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

require_once "config.php";

$user_id = $_SESSION["id"];

$sql = "SELECT 'Income' AS type,
    source AS category,
    amount
FROM income WHERE user_id = '$user_id'

UNION ALL

SELECT 'Expense' AS type,
    category,
    amount
FROM expense WHERE user_id = '$user_id'";

$incomeQuery = "SELECT SUM(amount) AS total_income FROM income WHERE user_id = '$user_id' ";
$incomeResult = mysqli_query($conn, $incomeQuery);
$incomeRow = mysqli_fetch_assoc($incomeResult);

$totalIncome = $incomeRow['total_income'];

$expenseQuery = "SELECT SUM(amount) AS total_expense FROM expense WHERE user_id = '$user_id'";
$expenseResult = mysqli_query($conn, $expenseQuery);
$expenseRow = mysqli_fetch_assoc($expenseResult);

$totalExpense = $expenseRow['total_expense'];

$balance = $totalIncome - $totalExpense;

$result = mysqli_query($conn, $sql);

$totalExpense = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(amount) AS total FROM expense WHERE user_id = '$user_id'")
)['total'] ?? 0;

$food = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(amount) AS total FROM expense  WHERE user_id = '$user_id' and category='Food'")
)['total'] ?? 0;

$travel = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(amount) AS total FROM expense WHERE user_id = '$user_id' and category='Travel'")
)['total'] ?? 0;

$utilities = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(amount) AS total FROM expense WHERE user_id = '$user_id' and category='Utilities'")
)['total'] ?? 0;

$entertainment = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(amount) AS total FROM expense WHERE user_id = '$user_id' and category='Entertainment'")
)['total'] ?? 0;

$foodPercent = $totalExpense ? ($food / $totalExpense) * 100 : 0;
$travelPercent = $totalExpense ? ($travel / $totalExpense) * 100 : 0;
$utilitiesPercent = $totalExpense ? ($utilities / $totalExpense) * 100 : 0;
$entertainmentPercent = $totalExpense ? ($entertainment / $totalExpense) * 100 : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Dashboard | Expense Tracker</title>
</head>

<body class="dark">
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
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Net balance</h3>
                    <p>Available after bills</p>
                    <div class="value">₹<?= number_format($balance, 2) ?></div>
                </div>
                <div class="card">
                    <h3>Monthly income</h3>
                    <p>Expected this month</p>
                    <div class="value">₹<?= number_format($totalIncome, 2) ?></div>
                </div>
                <div class="card">
                    <h3>Monthly expenses</h3>
                    <p>Current spending</p>
                    <div class="value">₹<?= number_format($totalExpense, 2) ?></div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $row["type"] ?></td>
                                    <td><?= $row["category"] ?></td>
                                    <td>₹<?= $row["amount"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="card">
                    <h3>Budget health</h3>
                    <div class="progress-list">
                        <div class="progress-row">
                            <div class="page-header">
                                <strong>Food</strong>
                                <span><?= round($foodPercent) ?>%</span>
                            </div>
                            <div class="progress-bar">
                                <span style="width:<?= $foodPercent ?>%"></span>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row">
                                <div class="page-header">
                                    <strong>Travel</strong>
                                    <span><?= round($travelPercent) ?>%</span>
                                </div>
                                <div class="progress-bar">
                                    <span style="width:<?= $travelPercent ?>%"></span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row">
                                <div class="page-header">
                                    <strong>Utilities</strong>
                                    <span><?= round($utilitiesPercent) ?>%</span>
                                </div>
                                <div class="progress-bar">
                                    <span style="width:<?= $utilitiesPercent ?>%"></span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row">
                                <div class="page-header">
                                    <strong>Entertainment</strong>
                                    <span><?= round($entertainmentPercent) ?>%</span>
                                </div>
                                <div class="progress-bar">
                                    <span style="width:<?= $entertainmentPercent ?>%"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="main.js"></script>
</body>

</html>