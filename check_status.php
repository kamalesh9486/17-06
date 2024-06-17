<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <style>
        /* Base styles */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Light background color */
            background: url('nn.png') no-repeat center center fixed;
            background-size: cover;
        }

        header {
            width: 100%;
            background-color: #003366;
            color: white;
            position: relative;
            padding: 10px 0;
        }

        header img {
            width: 100%;
            display: block;
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
            max-width: 600px;
            margin: 100px auto 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff; /* White background for the container */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
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

        /* Status indicator styles (optional) */
        .status-pending {
            color: orange;
        }

        .status-approved {
            color: green;
        }

        .status-rejected {
            color: red;
        }

        /* Link styles */
        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
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
    <h1> Application Status</h1>
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

    $register_number = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $register_number = $_POST['registerNumber'];

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM grievances WHERE register_number = ?");
        $stmt->bind_param("s", $register_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
           // echo "<th>Name</th>";
            echo "<th>Register Number</th>";
          //  echo "<th>Course Name</th>";
          //  echo "<th>Mobile</th>";
          //  echo "<th>Email</th>";
           // echo "<th>Address</th>";
            echo "<th>Application Submitted On</th>";
            echo "<th>Grievance Type</th>";
            echo "<th>Status</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            // Output data of each row
            
// Your existing PHP code for fetching records
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['register_number']) . "</td>";
    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
    echo "<td>" . htmlspecialchars($row['grievance_type']) . "</td>";
    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
    echo "<td><button type='button' class='btn btn-primary view-details' data-timestamp='" . htmlspecialchars($row['created_at']) . "'>View Details</button></td>";
    echo "</tr>";
}


            echo "</table>";
        } else {
            echo "<p>No records found for the given register number.</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
    <a href="status_check.html">Back to Status Check</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
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

    // Add event listener for "View Details" buttons
    document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', function() {
            var timestamp = this.getAttribute('data-timestamp');
            window.location.href = 'view_details.php?timestamp=' + encodeURIComponent(timestamp);
        });
    });
});

</script>
</body>
</html>