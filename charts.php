<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - Philemon Financials</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <main class="container">
        <h1 class="text-center mt-5">Loan Analytics</h1>
        <canvas id="loanChart" width="400" height="200"></canvas>
        <script>
            const ctx = document.getElementById('loanChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Approved', 'Rejected'],
                    datasets: [{
                        label: 'Loan Applications',
                        data: [12, 19, 3],
                        backgroundColor: ['blue', 'green', 'red']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        </script>
    </main>
</body>
</html>