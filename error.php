<?php
// Define the error log file
$error_log = 'error_log.txt';

// Function to log errors
function log_error($error_message) {
    global $error_log;
    $timestamp = date('Y-m-d H:i:s');
    $formatted_error = "[{$timestamp}] - {$error_message}\n";
    file_put_contents($error_log, $formatted_error, FILE_APPEND);
}

// Check if there's an error message passed through the URL
if (isset($_GET['error'])) {
    $error_message = htmlspecialchars($_GET['error']);
    log_error($error_message);
} else {
    $error_message = "An unknown error occurred.";
    log_error($error_message);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Error - Carrefour Mall</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .error-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #d9534f;
        }
        a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Oops! Something went wrong.</h1>
        <p><?php echo $error_message; ?></p>
        <p><a href="index.html">Go back to the homepage</a></p>
    </div>
</body>
</html>
