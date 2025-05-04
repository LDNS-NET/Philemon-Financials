<?php
session_start();
require '../includes/db.php';

// Ensure the user is authenticated and an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// Fetch all loan requests
$query = $pdo->query("SELECT * FROM loan_requests");
$requests = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Philemon Financials</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <header class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Philemon Financials</a>
        <a class="btn btn-danger" href="../auth/logout.php">Logout</a>
    </header>
    <main class="container">
        <h1 class="text-center mt-5">Admin Dashboard</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Tracking Code</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['user_id'] ?></td>
                        <td><?= $request['email'] ?></td>
                        <td><?= $request['phone'] ?></td>
                        <td><?= $request['tracking_code'] ?></td>
                        <td><?= $request['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
</body>
</html>