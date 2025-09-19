<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="wh2.cssS">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creamsolder Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<header>
    <div style="text-align: right;">
    <h2 style="margin-left: 20px; ">MSS</h2>
    <?PHP
    include 'settime.php';
    ?>
    </div>
</header>

<body class="body bg-info" >
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<div class="container">
    <div class="row">
        <div class="col-6 bg-warning">nihon</div>
        <div class="col-6 bg-success">sENJU</div>
        <hr>
    </div>
    <div class="row">
    <div class="row col-6 bg-light">
               <table class="table">
                <thead>
                    <tr class="table-white">
                        <th>VALID DATE</th>
                        <th>QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Your SQL query
                    $_sql = "SELECT validitydate,count(*) AS Quantity FROM tblcreamsolder WHERE gcode ='NP303-COSMO-LH-T4'AND thawingtime IS NULL GROUP BY validitydate DESC LIMIT 5";
                    
                    // Execute the query
                    $result = mysqli_query($conn, $_sql);

                    // Initialize total count variable
                    $totalCount = 0;

                    // Check if query was successful
                    if ($result) {
                        // Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
                            // Fetch and display results
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Add the count to the total
                                $totalCount += $row['Quantity'];
                                
                                // Display each row
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['validitydate']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['Quantity']) . '</td>';
                                echo '</tr>';
                            }
                            
                            // Display the total count
                            echo '<tr><td><strong>Total</strong></td><td><strong>' . htmlspecialchars($totalCount) . '</strong></td></tr>';
                        } else {
                            echo '<tr><td colspan="2" style="color: red; text-align: center;">No results found</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">Error executing query: ' . mysqli_error($conn) . '</td></tr>';
                    }

                    ?>
                </tbody>

               </table>
               
            </div>
            <div class="row col-6 bg-light ">
               <table class="table">
                <thead>
                    <tr class="table-white">
                        <th>VALID DATE</th>
                        <th>QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Your SQL query
                    $_sql = "SELECT validitydate,count(*) AS Quantity FROM tblcreamsolder WHERE gcode ='NP303-COSMO-LH-T4'AND thawingtime IS NULL GROUP BY validitydate DESC LIMIT 5";
                    
                    // Execute the query
                    $result = mysqli_query($conn, $_sql);

                    // Initialize total count variable
                    $totalCount = 0;

                    // Check if query was successful
                    if ($result) {
                        // Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
                            // Fetch and display results
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Add the count to the total
                                $totalCount += $row['Quantity'];
                                
                                // Display each row
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['validitydate']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['Quantity']) . '</td>';
                                echo '</tr>';
                            }
                            
                            // Display the total count
                            echo '<tr><td><strong>Total</strong></td><td><strong>' . htmlspecialchars($totalCount) . '</strong></td></tr>';
                        } else {
                            echo '<tr><td colspan="2" style="color: red; text-align: center;">No results found</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">Error executing query: ' . mysqli_error($conn) . '</td></tr>';
                    }

                    ?>
                </tbody>

               </table>
            </div>
    </div>
</div>
</body>
<footer>
    <p>&copy; <?php echo date("Y"); ?> MSS H.Andaya</p>
</footer>

</html>