<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Successful - Philemon Financials</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Application Submitted</h1>
    </header>
    <main>
        <p>Your loan application has been submitted successfully!</p>
        <p>Tracking Code: <strong><?php echo htmlspecialchars($_GET['tracking_code']); ?></strong></p>
        <a href="index.php" class="btn">Back to Home</a>
    </main>
    <footer>
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
</body>
</html>