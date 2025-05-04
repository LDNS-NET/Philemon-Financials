<?php
session_start();
require '../includes/db.php';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: ../dashboard/user.php');
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Philemon Financials</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <header class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Philemon Financials</a>
    </header>
    <main class="container">
        <h1 class="text-center mt-5">Login</h1>
        <form method="POST" class="mt-3">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </main>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
</body>
</html>