<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            width: 100%;
            position: sticky;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        header img {
            width: 100%;
        }

        button#toggleButton {
      background-color: #003366;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
    }

    button#toggleButton:hover {
      background-color: #00509E;
    }

        .dashboard {
            width: 250px;
            background-color: rgba(17, 98, 179, 0.8);
            color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(88, 240, 146, 0.5);
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
        }

        .dashboard.open {
            display: block;
        }

        .dashboard h2 {
            margin-top: 0;
        }

        .dashboard-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: rgba(192, 186, 241, 0.9);
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            text-align: left;
        }

        .dashboard-button:hover {
            background-color: #71eb8c;
        }


        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .details-container {
            display: flex;
            justify-content: space-between;
        }

        .details-column {
            width: 48%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            text-align: center;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        .document-link {
            color: #1a73e8;
            text-decoration: none;
        }

        .document-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
        <img src="CFR.png" alt="Banner image not found">
        <button id="toggleButton">☰</button>
        <div id="dashboard" class="dashboard">
          <h2>Dashboard</h2>
          <button class="dashboard-button" id="button1">Student Grievance</button>
          <button class="dashboard-button" id="button2">Grievance Status</button>
          <button class="dashboard-button">Faculties</button>
          <button class="dashboard-button">Exams</button>
          <button class="dashboard-button">Administration</button>
          <button class="dashboard-button">Library</button>
        </div>
    </header>
 
    <div class="container">
        <h1>Application Details</h1>
        <?php
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vinzo1";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['timestamp'])) {
            $timestamp = $_GET['timestamp'];

            // Prepare and execute the SQL query
            $stmt = $conn->prepare("SELECT * FROM grievances WHERE created_at = ?");
            $stmt->bind_param("s", $timestamp);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Split the results into two columns
                $row = $result->fetch_assoc();
                $half = ceil(count($row) / 2);
                $columns = array_keys($row);
                $values = array_values($row);

                echo '<div class="details-container">';
                echo '<div class="details-column">';
                echo '<table>';
                echo '<tr><th>Column Name</th><th>Value</th></tr>';
                for ($i = 0; $i < $half; $i++) {
                    $column = htmlspecialchars($columns[$i]);
                    $value = htmlspecialchars($values[$i]);
                    if (in_array($column, ['document1', 'document2', 'document3', 'document4', 'document5', 'document6', 'document7', 'document8', 'document9'])) {
                        // Display document link instead of file path
                        echo "<tr><td>$column</td><td><a class='document-link' href='uploads/$value' target='_blank'>View Document</a></td></tr>";
                    } else {
                        echo "<tr><td>$column</td><td>$value</td></tr>";
                    }
                }
                echo '</table>';
                echo '</div>';

                echo '<div class="details-column">';
                echo '<table>';
                echo '<tr><th>Column Name</th><th>Value</th></tr>';
                for ($i = $half; $i < count($columns); $i++) {
                    $column = htmlspecialchars($columns[$i]);
                    $value = htmlspecialchars($values[$i]);
                    if (in_array($column, ['Fees_Payment_Details','Hall_Ticket','Exam_Application_Form','Available_Mark_Statement','Consolidated_Mark_Statement','Course_Completion_Certificate','Application_Fees','Genuine_Certificate_Fees','PSTM',])) {
                        // Display document link instead of file path
                        echo "<tr><td>$column</td><td><a class='document-link' href='uploads/$value' target='_blank'>View Document</a></td></tr>";
                    } else {
                        echo "<tr><td>$column</td><td>$value</td></tr>";
                    }
                }
                echo '</table>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "<p>No records found for the given timestamp.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Invalid request.</p>";
        }

        $conn->close();
        ?>
        <a href="status_check.html" class="back-button">Back to Status Check</a>
    </div>
</body>
<script>   document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('toggleButton').addEventListener('click', function() {
                var dashboard = document.getElementById('dashboard');
                dashboard.classList.toggle('open');
            });

            document.getElementById('button1').addEventListener('click', function() {
                window.location.href = 'grievances.html'; 
            });

            document.getElementById('button2').addEventListener('click', function() {
                window.location.href = 'status_check.html'; 
            });

            document.addEventListener('click', function(event) {
                var dashboard = document.getElementById('dashboard');
                var toggleButton = document.getElementById('toggleButton');
                if (!dashboard.contains(event.target) && !toggleButton.contains(event.target)) {
                    dashboard.classList.remove('open');
                }
            });
        });</script>
</html>
