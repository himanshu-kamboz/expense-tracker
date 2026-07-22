<?php
require_once "config.php";


session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION["email"];

$sql = "SELECT * FROM `login-data` WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (isset($_POST["change-password"])) {

    $currentPassword = trim($_POST["currentPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    if (!password_verify($currentPassword, $user["password"])) {

        echo "<script>alert('Current password is incorrect!');</script>";
    } elseif ($newPassword != $confirmPassword) {

        echo "<script>alert('New password and Confirm password do not match!');</script>";
    } else {

        $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

        $update = "UPDATE `login-data`
                   SET password='$newHash'
                   WHERE email='$email'";

        if (mysqli_query($conn, $update)) {

            echo "<script>alert('Password Updated Successfully');</script>";
        } else {

            echo "<script>alert('Something went wrong');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Settings | Expense Tracker</title>
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
                    <li><a href="reports.php"><i class="fa-solid fa-chart-pie"></i>Reports</a></li>
                    <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li class="active"><a href="settings.php"><i class="fa-solid fa-gear"></i>Settings</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </aside>

        <main class="content">
            <div class="page-header">
                <h2>Preferences</h2>
            </div>

            <section class="card form-grid">
                <div class="input-container">
                    <label for="theme">Theme</label>
                    <select id="theme">
                        <option value="dark">Dark</option>
                        <option value="light">Light</option>
                    </select>
                </div>
                <div class="card">
                    <h3>Change Password</h3>

                    <form method="POST" class="form-grid">

                        <div class="input-container">
                            <label>Current Password</label>
                            <input type="password" name="currentPassword">
                        </div>

                        <div class="input-container">
                            <label>New Password</label>
                            <input type="password" name="newPassword">
                        </div>

                        <div class="input-container">
                            <label>Confirm Password</label>
                            <input type="password" name="confirmPassword">
                        </div>

                        <button class="btn" name="change-password">
                            Update Password
                        </button>

                    </form>
                </div>

                <div class="card">

                    <h3>Notifications</h3>

                    <label>
                        <input type="checkbox" checked>
                        Email Notifications
                    </label>

                    <br><br>

                    <label>
                        <input type="checkbox">
                        Monthly Report
                    </label>

                </div>

                <div class="card">
                    <h3>Account</h3>

                    <p><strong>Name:</strong> <?= $_SESSION["user"]; ?></p>

                    <p><strong>Email:</strong> <?= $_SESSION["email"]; ?></p>
                </div>

                <div class="card">

                    <h3>Application Information</h3>

                    <p><strong>Application:</strong> Expense Tracker</p>

                    <p><strong>Version:</strong> 1.0</p>

                    <p><strong>Developer:</strong> Himanshu Kamboj</p>

                </div>
            </section>
        </main>
    </div>
    <script src="main.js"></script>
</body>

</html>