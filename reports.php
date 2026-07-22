<?php
require_once "config.php";


session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}


$incomeQuery = "SELECT SUM(amount) AS total_income FROM income ";
$incomeResult = mysqli_query($conn, $incomeQuery);
$incomeRow = mysqli_fetch_assoc($incomeResult);

$totalIncome = $incomeRow['total_income'] ?? 0;;

$expenseQuery = "SELECT SUM(amount) AS total_expense FROM expense ";
$expenseResult = mysqli_query($conn, $expenseQuery);
$expenseRow = mysqli_fetch_assoc($expenseResult);

$totalExpense = $expenseRow['total_expense'] ?? 0;;

$balance = $totalIncome - $totalExpense;

$incomeCount = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM income"
))['total'];

$expenseCount = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM expense"
))['total'];

$incomeData = mysqli_query(
    $conn,
    "SELECT source, amount, date FROM income ORDER BY id DESC LIMIT 10"
);

$expenseData = mysqli_query(
    $conn,
    "SELECT category, amount FROM expense ORDER BY id DESC LIMIT 10"
);

$expensePercentage = 0;

if ($totalIncome > 0) {
    $expensePercentage = ($totalExpense / $totalIncome) * 100;
}

$savingsPercentage = 0;

if ($totalIncome > 0) {
    $savingsPercentage = (($totalIncome - $totalExpense) / $totalIncome) * 100;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Reports | Expense Tracker</title>
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
                    <h3>Total Income</h3>
                    <div class="value">₹<?= number_format($totalIncome, 2); ?></div>
                </div>

                <div class="card">
                    <h3>Total Expense</h3>
                    <div class="value">₹<?= number_format($totalExpense, 2); ?></div>
                </div>

                <div class="card">
                    <h3>Current Balance</h3>
                    <div class="value">₹<?= number_format($balance, 2); ?></div>
                </div>

                <div class="card">
                    <h3>Total Transactions</h3>
                    <div class="value"><?= $incomeCount + $expenseCount; ?></div>
                </div>

                <div class="card">
                    <h3>Expense Percentage</h3>
                    <div class="value">
                        <?= number_format($expensePercentage, 2); ?>%
                    </div>
                </div>

                <div class="card">
                    <h3>Savings Percentage</h3>
                    <div class="value">
                        <?= number_format($savingsPercentage, 2); ?>%
                    </div>
                </div>

            </section>

            <div class="card table-card">
                <h3>Recent Income</h3>

                <table class="table">

                    <tr>
                        <th>Source</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($incomeData)) { ?>

                        <tr>
                            <td><?= $row['source']; ?></td>
                            <td>₹<?= number_format($row['amount'], 2); ?></td>
                            <td><?= $row['date']; ?></td>
                        </tr>

                    <?php } ?>

                </table>

            </div><br>

            <div class="card table-card">

                <h3>Recent Expenses</h3>

                <table class="table">

                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($expenseData)) { ?>

                        <tr>
                            <td><?= $row['category']; ?></td>
                            <td>₹<?= number_format($row['amount'], 2); ?></td>
                        </tr>

                    <?php } ?>

                </table>

            </div><br>

            <div class="grid-2">

                <div class="card">
                    <h3>Income vs Expense</h3>
                    <canvas id="lineChart"></canvas>
                </div>

                <div class="card">
                    <h3>Expense Category</h3>
                    <canvas id="doughnutChart"></canvas>
                </div>

            </div><br>

            <section class="card">
                <h3>Monthly summary</h3>
                <p>
                    <?php
                    if ($balance > 0) {
                        echo "<p>🎉 Excellent financial performance this month! You saved <strong>₹" . number_format($balance, 2) . "</strong>. Your savings rate is <strong>" . number_format($savingsPercentage, 2) . "%</strong>. Keep up the great work!</p>";
                    } elseif ($balance == 0) {
                        echo "<p>⚖️ Your income and expenses were equal this month. Try to reduce unnecessary expenses to build savings next month.</p>";
                    } else {
                        echo "<p>⚠️ Your expenses exceeded your income by <strong>₹" . number_format(abs($balance), 2) . "</strong>. Consider reviewing your spending and creating a stricter budget.</p>";
                    }
                    ?>
                </p>
            </section>
        </main>
    </div>
    
    <script src="main.js"></script>
    <script>
        new Chart(document.getElementById("lineChart"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [{
                        label: "Income",
                        data: [12000, 18000, 15000, 22000, 25000, 28000],
                        borderColor: "#22c55e",
                        backgroundColor: "rgba(34,197,94,0.15)",
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: "Expense",
                        data: [8000, 12000, 9000, 14000, 17000, 19000],
                        borderColor: "#ef4444",
                        backgroundColor: "rgba(239,68,68,0.15)",
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: "#fff"
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: "#fff"
                        }
                    },
                    y: {
                        ticks: {
                            color: "#fff"
                        }
                    }
                }
            }
        });

        new Chart(document.getElementById("doughnutChart"), {
            type: "doughnut",
            data: {
                labels: ["Food", "Travel", "Shopping", "Bills", "Entertainment"],
                datasets: [{
                    data: [5000, 2500, 4000, 3500, 2000],
                    backgroundColor: [
                        "#22c55e",
                        "#3b82f6",
                        "#f59e0b",
                        "#ef4444",
                        "#8b5cf6"
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: "70%",
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#fff"
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>