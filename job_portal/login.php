
<?php
session_start();
include "db.php";

$message = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        if ($user['role'] == "director" && $user['approved'] == 0) {
            $message = "Your account is waiting for admin approval.";
        } else {
            session_regenerate_id(true);

            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == "admin") {
                header("Location: admin.php");
            } elseif ($user['role'] == "director") {
                header("Location: director.php");
            } else {
                header("Location: user.php");
            }
            exit();
        }

    } else {
        $message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | JobPortal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>JobPortal</h2>
    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
    </nav>
</header>

<div class="form-container">

    <h2>Welcome Back!</h2>
    <p>Login to access your JobPortal account.</p>

    <?php if ($message != "") { ?>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php } ?>

    <form method="POST">

        <label>Email Address</label>
        <input type="email" name="email"
               placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Enter your password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <p class="bottom-text">
        Don't have an account?
        <a href="register.php">Register here</a>
    </p>

</div>

</body>
</html>
