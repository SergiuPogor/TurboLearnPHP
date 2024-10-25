<?php
// Perform an HTTP redirect with a delay in PHP

// Set the delay in seconds
$delay = 5;

// Set the target URL for the redirect
$targetUrl = "https://example.com/next-page.php";

// Display a message before redirecting
echo "<p>You will be redirected in {$delay} seconds. Please wait...</p>";

// Use JavaScript to perform the redirect after the delay
echo "<script>
        setTimeout(function() {
            window.location.href = '{$targetUrl}';
        }, {$delay} * 1000);
      </script>";

// Optionally, you can use the header function for immediate redirects
// Uncomment the line below if you want to enforce an immediate redirect without delay
// header("Location: {$targetUrl}");
?>