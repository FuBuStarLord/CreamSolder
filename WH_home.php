<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="WH.css">
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creamsolder Report</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>
<header style="padding: 30px;">
    <h2 style="margin-left: 20px; ">MSS</h2>
    <div style="text-align: right;">
    <?php
    include 'settime.php';
    ?>
    </div>
</header>

<body class="body bg-info" >
<script src="popper.min.js"></script>
<script src="bootstrap.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->

<div class="container-fluid">
    <div class="rows">
    <h2 class="title text-center " style="font-size: 50px;" id="title">Solder Paste Stock Monitoring</h2>
    <!--########################################## For senju Monitoring ################################# -->
        <div class="col-lg-12 bg-danger-subtle text-center" style="padding: 10px; " id="Senju"><strong style="font-size: 30px; vertical-align: middle; display:inline-block; border: radius 10%;" >Maker:SENJU</strong> <img src="png/cream.png" alt="Solderpaste" width="40" height="40"></div>
        <hr>
        <div class="container-fluid text-center">
            <div class="row col-lg-12 bg-light">
               <table class="table tabledesign" >
                <thead>
                    <tr>
                        <th>VALIDITY DATE</th>
                        <th>QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Your SQL query
                    $_sql = "SELECT validitydate,count(*) AS Quantity FROM tblcreamsolder WHERE creamid like ('A%')AND reftime IS NOT NULL AND thawingtime IS NULL  GROUP BY validitydate DESC";
                    
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
                                
                                //Display each row
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['validitydate']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['Quantity']) . '</td>';
                                echo '</tr>';
                            }
                            
                            // Display the total count
                            echo '<tr><td><strong>Total</strong></td><td><strong>' . htmlspecialchars($totalCount) . '</strong></td></tr>';
                        } else {
                            echo '<tr><td colspan="2" style="color: red; text-align: center;"><strong>No Stock of cream solder SENJU</strong></td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">Error executing query: ' . mysqli_error($conn) . '</td></tr>';
                    }
                    ?>
                </tbody>
               </table>
            </div>
        </div>
        <!--##################################### FOR NIHON MONITORING ######################################-->
        <div class="col-lg-12 bg-success text-center mt-3" style="padding: 10px;" id="Nihon"><strong style="font-size: 30px; vertical-align: middle; display:inline-block;" >Maker:NIHON</strong> <img src="png/cream.png" alt="Solderpaste" width="40" height="40"></div>
        <hr>
        <div class="container-fluid text-center">
            <div class="row col-lg-12 bg-light">
               <table class="table tabledesign">
                <thead>
                    <tr>
                        <th>VALIDITY DATE</th>
                        <th>QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Your SQL query
                    $_sql = "SELECT validitydate,count(*) AS Quantity FROM tblcreamsolder WHERE creamid like ('F%') AND reftime IS NOT NULL AND thawingtime IS NULL GROUP BY validitydate DESC";
                    
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
                            echo '<tr><td colspan="2" style="color: red; text-align: center;"><Strong>No Stock of cream solder NIHON.</strong></td></tr>';
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
</div>
<p style="text-align: center; color:beige; padding-top: 20px;">&copy; <?php echo date("Y"); ?> MSS H.Andaya</p>
</body>
</html>