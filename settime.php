<?php
// Set the timezone to Manila
date_default_timezone_set('Asia/Manila');

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Clock</title>
    <style>
        body { font-family: Arial, sans-serif; }
        #clock { font-size: 24px; }
    </style>
</head>
<body>
    <div id="clock">
        <!-- The PHP variable provides the initial time -->
        <?php echo "<span id='time'>$currentDateTime</span>"; ?>
    </div>

    <script>
        // JavaScript to update the time in real-time
        function updateClock() {
            const timeElement = document.getElementById('time');
            const now = new Date();
            // Format DATE as YY-MM-DD
            const year = now.getFullYear().toString().padStart(4, '0');
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            // Format time as HH:MM:SS
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            timeElement.textContent = formattedTime;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initialize the clock immediately
        updateClock();
    </script>
</body>
</html>
