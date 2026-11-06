
<?php
session_start();
include "db.php";

$keyword = $_GET['keyword'] ?? "";
$location = $_GET['location'] ?? "";
$category = $_GET['category'] ?? "";

$sql = "SELECT vacancies.*, users.name AS company
        FROM vacancies
        LEFT JOIN users ON vacancies.posted_by = users.id
        WHERE vacancies.title LIKE ?
        AND vacancies.location LIKE ?
        AND vacancies.category LIKE ?
        ORDER BY vacancies.id DESC";

$stmt = mysqli_prepare($conn, $sql);

$k = "%$keyword%";
$l = "%$location%";
$c = "%$category%";

mysqli_stmt_bind_param($stmt, "sss", $k, $l, $c);
mysqli_stmt_execute($stmt);

$jobs = mysqli_stmt_get_result($stmt);

$categories = mysqli_query($conn,
    "SELECT DISTINCT category FROM vacancies ORDER BY category");

$totalJobs = mysqli_num_rows(mysqli_query($conn,
    "SELECT id FROM vacancies"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>JobPortal | Find Your Dream Job</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="main-header">
    <h2>Job<span>Portal</span></h2>

    <nav>
        <a href="index.php">Home</a>
        <a href="#jobs">Find Jobs</a>

        <?php if (isset($_SESSION['id'])) { ?>
            <a href="<?php
                echo $_SESSION['role'] == 'user' ? 'user.php' :
                    ($_SESSION['role'] == 'director' ? 'director.php' : 'admin.php');
            ?>">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="register.php" class="nav-button">Register</a>
        <?php } ?>
    </nav>
</header>

<section class="hero-section">
    <div class="hero-content">
        <p class="tagline">YOUR CAREER STARTS HERE</p>

        <h1>Find the job that<br>
            <span>fits your future.</span>
        </h1>

        <p class="hero-description">
            Explore opportunities, connect with companies
            and take the next step in your career.
        </p>

        <form method="GET" class="search-box">

            <input type="text" name="keyword"
                   placeholder="Job title or keyword"
                   value="<?php echo htmlspecialchars($keyword); ?>">

            <input type="text" name="location"
                   placeholder="Location"
                   value="<?php echo htmlspecialchars($location); ?>">

            <select name="category">
                <option value="">All Categories</option>

                <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                    <option value="<?php echo htmlspecialchars($cat['category']); ?>"
                        <?php echo $category == $cat['category'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($cat['category']); ?>
                    </option>
                <?php } ?>
            </select>

            <button type="submit">Search Jobs</button>
        </form>

        <p class="job-count">
            <?php echo $totalJobs; ?> opportunities listed on JobPortal
        </p>
    </div>
</section>

<section class="category-section">
    <h2>Explore Job Categories</h2>
    <p>Find opportunities in your preferred field.</p>

    <div class="category-list">
        <?php
        mysqli_data_seek($categories, 0);
        while ($cat = mysqli_fetch_assoc($categories)) {
        ?>
            <a class="category-card"
               href="index.php?category=<?php echo urlencode($cat['category']); ?>">
                <span>✦</span>
                <h3><?php echo htmlspecialchars($cat['category']); ?></h3>
                <small>Explore jobs</small>
            </a>
        <?php } ?>
    </div>
</section>

<section class="jobs-section" id="jobs">

    <div class="section-heading">
        <div>
            <h2>Latest Job Openings</h2>
            <p>Discover the latest opportunities from companies.</p>
        </div>

        <a href="index.php">View All Jobs →</a>
    </div>

    <div class="job-list">

        <?php if (mysqli_num_rows($jobs) > 0) { ?>

            <?php while ($job = mysqli_fetch_assoc($jobs)) { ?>

                <div class="job-card">

                    <div class="job-top">
                        <div class="company-icon">J</div>

                        <span class="job-label">NEW OPENING</span>
                    </div>

                    <h3><?php echo htmlspecialchars($job['title']); ?></h3>

                    <p class="company-name">
                        <?php echo htmlspecialchars($job['company'] ?? 'Company'); ?>
                    </p>

                    <div class="job-details">
                        <span>📍 <?php echo htmlspecialchars($job['location']); ?></span>
                        <span>💼 <?php echo htmlspecialchars($job['category']); ?></span>
                    </div>

                    <p class="job-description">
                        <?php
                        $description = $job['description'];
                        echo htmlspecialchars(substr($description, 0, 130));
                        if (strlen($description) > 130) echo "...";
                        ?>
                    </p>

                    <div class="job-bottom">
                        <span>Recently posted</span>

                        <a href="<?php
                            echo isset($_SESSION['id']) &&
                                 $_SESSION['role'] == 'user'
                                 ? 'user.php' : 'login.php';
                        ?>">Apply Now →</a>
                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="no-jobs">
                <h3>No jobs found</h3>
                <p>Try changing your search keyword or filters.</p>
                <a href="index.php">Clear Filters</a>
            </div>

        <?php } ?>

    </div>
</section>

<footer>
    <h2>JobPortal</h2>
    <p>Connecting talented people with great opportunities.</p>
    <p>© 2026 JobPortal. All rights reserved.</p>
</footer>

</body>
</html>
