<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Philemon Financials</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Philemon Financials</a>
    </header>
    <main class="container">
        <h1 class="text-center mt-5">Register</h1>
        <form action="../includes/register_process.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">Please enter your full name.</div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">Please enter your phone number.</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">Please enter a password.</div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </main>
    <footer class="bg-light text-center py-4">
        <p>&copy; 2025 Philemon Financials. All rights reserved.</p>
    </footer>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>