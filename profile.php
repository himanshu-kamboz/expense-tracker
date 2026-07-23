<?php
require_once "config.php";


session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION["email"];
$user_id = $_SESSION["id"];

$sql = "SELECT * FROM `login-data` WHERE id = '$user_id' and email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (isset($_POST["update-profile"])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $oldEmail = $_SESSION["email"];

    $sql = "UPDATE `login-data`
            SET name='$name', email='$email'
            WHERE id = '$user_id' and email='$oldEmail'";

    if (mysqli_query($conn, $sql)) {

        $_SESSION["user"] = $name;
        $_SESSION["email"] = $email;

        echo "<script>alert('Profile Updated Successfully');</script>";

    } else {
        echo "<script>alert('Something went wrong');</script>";
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
    <title>Profile | Expense Tracker</title>
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
                    <div class="avatar"> <?= strtoupper(substr($user['name'], 0, 1)); ?></div>
                    <div>
                        <h3><?= $user['name']; ?></h3>
                        <p><?= $user['email']; ?></p>
                    </div>
                </div>

                <form class="form-grid" method="POST">
                    <div class="input-container">
                        <label for="fullName">Full name</label>
                        <input type="text" name="name" id="fullName" value="<?= $user['name']; ?>">
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $user['email']; ?>">
                    </div>
                    <button class="btn" type="submit" name="update-profile">Update profile</button>
                </form>
            </section>

        </main>
    </div>
    <script src="main.js"></script>
</body>

</html>