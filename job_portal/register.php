
<?php
include "db.php";

$message = "";

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $approved = ($role == "director") ? 0 : 1;

    $sql = "INSERT INTO users (name, email, password, role, approved)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi",
        $name, $email, $password, $role, $approved);

    if (mysqli_stmt_execute($stmt)) {
        $message = ($role == "director")
            ? "Registration successful! Wait for admin approval."
            : "Account created successfully! You can now login.";
    } else {
        $message = "Email already registered. Please try another.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Job Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>JobPortal</h2>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<div class="form-container">
    <h2>Create Your Account</h2>
    <p>Join our portal to explore career opportunities.</p>

    <?php if ($message != "") { ?>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php } ?>

    <form method="POST" onsubmit="return validateForm()">

        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" id="password"
               placeholder="Minimum 6 characters" required>

        <label>Register As</label>
        <select name="role" required>
            <option value="user">Job Applicant</option>
            <option value="director">Company Director</option>
        </select>

        <button type="submit" name="register">Create Account</button>

    </form>

    <p class="bottom-text">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</div>

<script src="script.js"></script>
</body>
</html>
