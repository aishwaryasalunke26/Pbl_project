<?php
// Start output buffering to prevent premature output
ob_start();

// Include necessary files
require_once '../lib/Session.php';
Session::checkAdminSession();
require_once '../lib/Database.php';
require_once '../helpers/Format.php';

// Initialize necessary classes
$db  = new Database();
$fm  = new Format();

// Set headers to prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// Handle logout action
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    Session::destroy();
    header("Location: login.php");
    exit();
}

// End output buffering and flush the output
ob_end_flush();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="/exam">Online Examination System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php">Manage Users</a></li>
                <li class="nav-item"><a class="nav-link" href="quesadd.php">Add Question</a></li>
                <li class="nav-item"><a class="nav-link" href="queslist.php">Manage Question</a></li>
                <li class="nav-item"><a class="nav-link" href="?action=logout">Logout</a></li>
<li class="nav-item"><a class="nav-link" href="http://192.168.48.151:8080/index.php">Online Examination System</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Rest of your HTML content -->
</body>
</html>
