<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

require_once "config.php";
$user_id = $_SESSION["id"];

if (isset($_POST["save-expense"])) {

    $_description = trim($_POST["description"]);
    $_amount = trim($_POST["amount"]);
    $_category = trim($_POST["category"]);
    $_date = trim($_POST["date"]);



    $sql = "INSERT INTO expense(user_id, description, amount, category, date)
VALUES('$user_id','$_description','$_amount','$_category','$_date')";

    mysqli_query($conn, $sql);
}

$latestQuery = "SELECT amount FROM expense WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$latestResult = mysqli_query($conn, $latestQuery);
$latestRow = mysqli_fetch_assoc($latestResult);

$sql = "SELECT * FROM expense WHERE user_id = '$user_id' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);


$expenseQuery = "SELECT SUM(amount) AS total_expense FROM expense WHERE user_id = '$user_id' ";
$expenseResult = mysqli_query($conn, $expenseQuery);
$expenseRow = mysqli_fetch_assoc($expenseResult);

$totalExpense = $expenseRow['total_expense'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Expenses | Expense Tracker</title>
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
                    <li class="active"><a href="expense.php"><i class="fa-solid fa-arrow-trend-down"></i>Expenses</a></li>
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
            </div>

            <section class="stats-grid">
                <div class="card">
                    <h3>Total Expense</h3>
                    <div class="value">₹<?= number_format($totalExpense, 2) ?> </div>
                </div>
                <div class="card">
                    <h3>Latest Expense</h3>
                    <div class="value">₹<?= $latestRow['amount'] ?? 0 ?></div>
                </div>
            </section>

            <section class="grid-2">
                <div class="card">
                    <h3>Log an expense</h3>
                    <form class="form-grid" method="POST">
                        <div class="input-container">
                            <input type="hidden" name="user_id" id="user_id">
                        </div>
                        <div class="input-container">
                            <label for="name">Description</label>
                            <input type="text" name="description" id="name" placeholder="Groceries, rent, commute">
                        </div>
                        <div class="input-container">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" placeholder="0.00">
                        </div>
                        <div class="input-container">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                <option>Food</option>
                                <option>Travel</option>
                                <option>Utilities</option>
                                <option>Entertainment</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label>Date</label>
                            <input type="date" name="date" required>
                        </div>
                        <button class="btn" name="save-expense" type="submit">Save expense</button>
                    </form>
                </div>
                <div class="card table-card">
                    <h3>Latest expenses</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $row["category"] ?></td>
                                    <td>₹<?= number_format($row["amount"]) ?></td>
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
    <script src="main.js"></script>
</body>

</html>