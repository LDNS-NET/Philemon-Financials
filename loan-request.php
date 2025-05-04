<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Loan - Philemon Financials</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Request a Loan</h1>
    </header>
    <main>
        <form action="includes/loan_process.php" method="POST" enctype="multipart/form-data">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>

            <label for="id_number">ID Number</label>
            <input type="text" id="id_number" name="id_number" required>

            <label for="id_card">Upload ID Card</label>
            <input type="file" id="id_card" name="id_card" required>

            <label for="passport_photo">Upload Passport Photo</label>
            <input type="file" id="passport_photo" name="passport_photo" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Submit Loan Request</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
        <a href="https://wa.me/254707705899" class="whatsapp-button" target="_blank">WhatsApp Support</a>
    </footer>
</body>
</html>