<?php
session_start();
require '../includes/db.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Handle loan request submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id_number = $_POST['id_number'];
    $location = $_POST['location'];
    $tracking_code = uniqid('PHF-');

    // Handle file uploads
    $id_card_path = '../uploads/' . basename($_FILES['id_card']['name']);
    $passport_photo_path = '../uploads/' . basename($_FILES['passport_photo']['name']);
    move_uploaded_file($_FILES['id_card']['tmp_name'], $id_card_path);
    move_uploaded_file($_FILES['passport_photo']['tmp_name'], $passport_photo_path);

    // Insert into database
    $query = $pdo->prepare("INSERT INTO loan_requests (user_id, email, phone, id_number, id_card_path, passport_photo_path, location, tracking_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$_SESSION['user_id'], $email, $phone, $id_number, $id_card_path, $passport_photo_path, $location, $tracking_code]);

    // Notify user
    require '../includes/email.php';
    sendLoanEmail($email, $tracking_code);

    $_SESSION['success'] = "Your loan request has been submitted. Your tracking code is $tracking_code.";
    header('Location: track.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Loan - Philemon Financials</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <header class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Philemon Financials</a>
    </header>
    <main class="container">
        <h1 class="text-center mt-5">Request a Loan</h1>
        <form method="POST" enctype="multipart/form-data" class="mt-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="id_number">ID Number</label>
                <input type="text" class="form-control" id="id_number" name="id_number" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="id_card">ID Card Upload</label>
                <input type="file" class="form-control" id="id_card" name="id_card" required>
            </div>
            <div class="form-group">
                <label for="passport_photo">Passport Photo Upload</label>
                <input type="file" class="form-control" id="passport_photo" name="passport_photo" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
        </form>
    </main>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
</body>
</html>