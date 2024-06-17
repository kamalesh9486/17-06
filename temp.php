<?php
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

// Get form data
$name = htmlspecialchars($_POST['name']);
$register_number = htmlspecialchars($_POST['register_number']);
$course_name = htmlspecialchars($_POST['course_name']);
$date_of_birth = htmlspecialchars($_POST['date_of_birth']);
$program_type = htmlspecialchars($_POST['program_type']);
$main_course = htmlspecialchars($_POST['main_course']);
$mobile = htmlspecialchars($_POST['mobile']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$idcard = htmlspecialchars($_POST['idcard']);
$batch = htmlspecialchars($_POST['batch']);
$grievance_type = htmlspecialchars($_POST['grievance_type']);
$grievances_details = htmlspecialchars($_POST['grievances_details']);

// Process file uploads
$uploads_dir = 'uploads';
$document1 = $_FILES['document1']['name'] ? $uploads_dir . '/' . basename($_FILES['document1']['name']) : '';
$document2 = $_FILES['document2']['name'] ? $uploads_dir . '/' . basename($_FILES['document2']['name']) : '';
$document3 = $_FILES['document3']['name'] ? $uploads_dir . '/' . basename($_FILES['document3']['name']) : '';
$document4 = $_FILES['document4']['name'] ? $uploads_dir . '/' . basename($_FILES['document4']['name']) : '';
$document5 = $_FILES['document5']['name'] ? $uploads_dir . '/' . basename($_FILES['document5']['name']) : '';
$document6 = $_FILES['document6']['name'] ? $uploads_dir . '/' . basename($_FILES['document6']['name']) : '';
$document7 = $_FILES['document7']['name'] ? $uploads_dir . '/' . basename($_FILES['document7']['name']) : '';
$document8 = $_FILES['document8']['name'] ? $uploads_dir . '/' . basename($_FILES['document8']['name']) : '';
$document9 = $_FILES['document9']['name'] ? $uploads_dir . '/' . basename($_FILES['document9']['name']) : '';

// Move uploaded files to the uploads directory
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}
move_uploaded_file($_FILES['document1']['tmp_name'], $document1);
move_uploaded_file($_FILES['document2']['tmp_name'], $document2);
move_uploaded_file($_FILES['document3']['tmp_name'], $document3);
move_uploaded_file($_FILES['document4']['tmp_name'], $document4);
move_uploaded_file($_FILES['document5']['tmp_name'], $document5);
move_uploaded_file($_FILES['document6']['tmp_name'], $document6);
move_uploaded_file($_FILES['document7']['tmp_name'], $document7);
move_uploaded_file($_FILES['document8']['tmp_name'], $document8);
move_uploaded_file($_FILES['document9']['tmp_name'], $document9);

// Insert data into the database
$sql = "INSERT INTO grievances (name, register_number, course_name, date_of_birth, program_type, main_course, mobile, email, address, idcard, grievance_type, grievances_details, document1, document2, document3, document4, document5, document6, document7, document8, document9)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssssss", $name, $register_number, $course_name, $date_of_birth, $program_type, $main_course, $mobile, $email, $address, $idcard, $grievance_type, $grievances_details, $document1, $document2, $document3, $document4, $document5, $document6, $document7, $document8, $document9);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
      header("Location: confirmation.php?status=success");
        exit();

    } else {
        echo "Error executing prepared statement: " . $stmt->error;
    }

$stmt->close();
$conn->close();
?>
