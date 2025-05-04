<?php
session_start();
require '../includes/db.php';

// Handle tracking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tracking_code = $_POST['tracking_code'];

    $query = $pdo->prepare("SELECT * FROM loan_requests WHERE tracking_code = ?");
    $query->execute([$tracking_code]);
    $loan = $query->fetch(PDO::FETCH_ASSOC);

    if (!$loan) {
        $error = "No loan found with the given tracking code.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Loan - Philemon Financials</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <header class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Philemon Financials</a>
    </header>
    <main class="container">
        <h1 class="text-center mt-5">Track Your Loan</h1>
        <form method="POST" class="mt-3">
            <div class="form-group">
                <label for="tracking_code">Tracking Code</label>
                <input type="text" class="form-control" id="tracking_code" name="tracking_code" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Track Loan</button>
        </form>
        <?php if (isset($loan)): ?>
            <div class="mt-5">
                <h2>Loan Details</h2>
                <p><strong>Email:</strong> <?= $loan['email'] ?></p>
                <p><strong>Phone:</strong> <?= $loan['phone'] ?></p>
                <p><strong>Status:</strong> <?= $loan['status'] ?></p>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger mt-3"><?= $error ?></div>
        <?php endif; ?>
    </main>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
</body>
</html>