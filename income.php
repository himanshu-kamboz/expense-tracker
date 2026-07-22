<?php
require_once "config.php";

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}


if (isset($_POST["save-income"])) {

    $_source = trim($_POST["source"]);
    $_amount = trim($_POST["amount"]);
    $_date = trim($_POST["date"]);

    $sql = "INSERT INTO income(source, amount, date)
            VALUES ('$_source','$_amount','$_date')";

    mysqli_query($conn, $sql);
}

$incomeQuery = "SELECT SUM(amount) AS total_income FROM income ";
$incomeResult = mysqli_query($conn, $incomeQuery);
$incomeRow = mysqli_fetch_assoc($incomeResult);

$totalIncome = $incomeRow['total_income'] ?? 0;

$latestQuery = "SELECT amount FROM income ORDER BY id DESC LIMIT 1";
$latestResult = mysqli_query($conn, $latestQuery);
$latestRow = mysqli_fetch_assoc($latestResult);

$sql = "SELECT * FROM income";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Income | Expense Tracker</title>
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
                    <li class="active"><a href="income.php"><i class="fa-solid fa-arrow-trend-up"></i>Income</a></li>
                    <li><a href="expense.php"><i class="fa-solid fa-arrow-trend-down"></i>Expenses</a></li>
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Income overview</h2>
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Total income</h3>
                    <div class="value">₹<?= number_format($totalIncome, 2) ?></div>
                </div>
                <div class="card">
                    <h3>Latest Income</h3>
                    <div class="value">₹<?= $latestRow['amount'] ?? 0; ?></div>
                </div>
            </section>

            <section class="grid-2">
                <div class="card">
                    <h3>Add income</h3>
                    <form class="form-grid" method="POST">
                        <div class="input-container">
                            <label for="source">Source</label>
                            <select name="source" id="source">
                                <option>Salary</option>
                                <option>Freelance</option>
                                <option>Bonus</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" placeholder="0.00">
                        </div>
                        <div class="input-container">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date">
                        </div>
                        <button class="btn" name="save-income" type="submit">Save income</button>
                    </form>
                </div>
                <div class="card table-card">
                    <h3>Recent income</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $row["source"] ?></td>
                                    <td>₹<?= $row["amount"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>

</html>