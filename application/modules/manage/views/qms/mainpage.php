<?php
    // You may need to include necessary headers or setup depending on your framework
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect to 2025 Filtered QMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Go to QMS List Filtered by Year 2025</h3>
        <p>Click the button below to view the QMS list filtered by the year 2025:</p>
        <!-- Button to navigate to the page with the 2025 filter -->
        <a href="<?php echo site_url('qms?tahunFilter=2025'); ?>" class="btn btn-primary">
            Go to QMS 2025
        </a>
    </div>

    <!-- Optional: Include JavaScript if you need additional functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
