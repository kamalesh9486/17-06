<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission </title>
    <style>
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
            position: sticky;
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
        .success {
            color: green;
        }

        .failure {
            color: red;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
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
        <?php if ($_GET['status'] === 'success'): ?>
            <h1 class="success">Submission Successful!</h1>
            <h2>Thank you for submitting your information,you can check your application status by using your register number  .</h2>
        <?php else: ?>
            <h1 class="failure">Submission Failed</h1>
            <p>There was an error processing your request. Please try again.</p>
        <?php endif; ?>
        <a href="home.php">Back to Home</a>
    </div>
</body>
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
    });
</script>

</html>
