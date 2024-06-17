<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            background: url('nn.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        header {
            width: 100%;
            position: absolute;
            top: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="file"],
        input[type="email"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #sub-dropdown-container select {
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <img src="CFR.png" width="100%" alt="no image">
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br>
        <h1 text-color="white">student information</h1>
    <form action="submit.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="registerNumber">Register Number:</label>
        <input type="text" id="registerNumber" name="registerNumber" required>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>

        <label for="idCard">Upload ID Card:</label>
        <input type="file" id="idCard" name="idCard" accept="image/*" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="date_of_birth">Date Of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="grievance">Grievance Type:</label>
        <select id="grievance" name="grievance" required>
            <option value="Select">Select</option>
            <option value="Course Completion Certificate">Course Completion Certificate</option>
            <option value="Result">Result</option>
            <option value="Current Mark Statement">Current Mark Statement</option>
            <option value="Consolidated Mark Statement">Consolidated Mark Statement</option>
            <option value="Provisional Certificate">Provisional Certificate</option>
            <option value="Genuine Certificate">Genuine Certificate</option>
            <option value="PSTM">PSTM</option>
        </select>

        <label for="programType">Program Type:</label>
        <select name="programType" id="programType">
            <option value="">Select Program Type</option>
            <option value="semester">Semester</option>
            <option value="nonSemester">Non-Semester</option>
        </select>

        <label for="main-dropdown">Course Type:</label>
        <select id="main-dropdown">
            <option value="">Select Course Type</option>
            <!-- Options will be populated by JavaScript -->
        </select>

        <div id="sub-dropdown-container">
            <!-- Sub-dropdown will be populated by JavaScript -->
        </div>

        <input type="submit" value="Submit">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const semesterCourses = {
                'Undergraduate': ['B.A. History [Tamil]', 'B.A. Political Science [Tamil]', 'B.A. Tamil', 'B.A. English', 'B.A. Economics [Tamil]',
                    'B.A. Journalism and Mass Communication [Tamil]', 'B.A. Public Administration [Tamil]', 'B.A Sociology [Tamil]',
                    'B.Sc. Botany [Tamil]', 'B.Com. [Tamil]', 'B.Com. (CA) [Tamil]', 'Part-I Language-Tamil', 'Part-I Language-French',
                    'Part-I Language-Hindi', 'Part-I Language-Malayalam', 'Part-I Language-Telugu', 'Part-Il Language-English',
                    'B.Sc. Botany', 'B.Sc. Chemistry', 'B.Sc. Computer Science', 'B.Sc. Microbiology', 'B.Sc. Physics', 'B.Sc. Psychology',
                    'B.Sc. Zoology', 'B.Sc. Mathematics', 'B.Sc. Visual Communication', 'B.Sc. (Tourism & Hospitality Management)', 'B.L.I.Sc.',
                    'B.Ed.'],
                'Postgraduate': ['M.A. History', 'M.A. Political Science', 'M.A. Public Administration', 'M.A. Sociology', 'M.A. Journalism and Mass Communication',
                    'M.A. Economics', 'M.A. English', 'M.A. Tamil', 'MTTM (Master of Tourism and Travel Management)', 'M.Com.(Group A)',
                    'M.Com. (Group B)', 'M.Com. (Computer Application)', 'M.B.A. (Master of Business Administration)', 'M.B.A. (Financial Management)',
                    'M.B.A. (International Business Management)', 'M.B.A. (Logistic and Supply chain Management)', 'M.B.A. (Human Resource Management)',
                    'M.B.A. (Marketing Management)', 'M.B.A. (Operations and Project Management)', 'M.B.A. (Master of Business Administration)',
                    'M.C.A. (Master of Computer Applications)', 'M. Sc. (Mathematics)', 'M. Sc. (Physics)', 'M.Sc. (Chemistry)', 'M. Sc. (Botany)',
                    'M.Sc. (Zoology)', 'M. Sc. (Psychology)', 'M.Sc. (Computer Science)', 'M.Sc. (Electronics & Communication)', 'M. Sc. (Visual Communication)',
                    'M.Lib.Sc. (Master of Library Science)'],
            };

            const nonSemesterCourses = {
                'UG Courses(2)': ["B.A. History", "B.A. Political Science", "B.A. Tamil", "B.Litt. (Tamil)", "B.A.English", "B.A.Economics", "B.A.Social Work", "B.A.Social Science", "B.A.Journalism & Mass Communication", "B.A.Public Administration", "B.A.Urdu","B.Sc.Physics", "B.Sc.Chemistry", "B.Sc.Botany", "B.Sc.Zoology", "B.Sc.Microbiology", "B.Sc.Hotel Management & Catering Science", "B.Sc.Tourism & Hospitality Management", "B.Sc.Computer Science", "B.Sc.Nutrition and Dietetics", "B.Sc.Environmental Science", "B.Sc.Visual Communication", "B.Sc.Psychology", "B.Sc.Yoga", "B.Sc.Mathematics","B.Com.Computer Application", "B.Com.Information Technology", "B.Com.","B.B.A.", "B.B.A.Retail", "B.B.A.Computer Application","B.C.A.", "B.C.A Lateral Entry", "B.C.A Direct II Year","B.C.A.", "B.C.A Lateral Entry", "B.C.A Direct II Year"],
                'PG cources(2)':["M.A.English Language and Linguistics", "M.A.Human Rights", "M.A.Women's Studies", "M.A.Journalism and Mass Communication", "M.A.Advertising and Public Relations", "M.A.Lateral Entry", "M.A.Social Work", "M.A.Other Subjects","M.Com.Finance", "M.Com.Banking", "M.Com.Co-operative Management", "M.Com.Marketing", "M.Com.Computer Application","M.Sc.Financial Management", "M.Sc.Marketing Management", "M.Sc.Human Resource Management", "M.Sc.Systems Management", "M.Sc.Retail Management", "M.Sc.International Business Management", "M.Sc.Tourism & Hotel Management", "M.Sc.Hospital Management", "M.Sc.Operations and Project Management", "M.Sc.Airline & Airport Management", "M.Sc.Logistic & Supply Chain Management","M.Sc.Mathematics", "M.Sc.Psychology", "M.Sc.Nutrition and Food Technology", "M.Sc.Physics", "M.Sc.Chemistry", "M.Sc.Electronics and Communication", "M.Sc.Botany", "M.Sc.Zoology", "M.Sc.Computer Science", "M.Sc.Hotel Management & Catering Science", "M.Sc.Tourism & Hospitality Management","M.L.I.Sc. (1 Year)"],
            };

            document.getElementById('programType').addEventListener('change', function() {
                const selectedProgramType = this.value;
                const mainDropdown = document.getElementById('main-dropdown');
                mainDropdown.innerHTML = '<option value="">Select Course Type</option>'; // Reset the main dropdown

                let courses = selectedProgramType === 'semester' ? semesterCourses : nonSemesterCourses;
                Object.keys(courses).forEach(key => {
                    const option = document.createElement('option');
                    option.value = key;
                    option.text = key;
                    mainDropdown.appendChild(option);
                });
            });

            document.getElementById('main-dropdown').addEventListener('change', function() {
                const selectedCourseType = this.value;
                const subDropdownContainer = document.getElementById('sub-dropdown-container');
                subDropdownContainer.innerHTML = ''; // Reset the sub-dropdown container

                const selectedProgramType = document.getElementById('programType').value;
                let courses = selectedProgramType === 'semester' ? semesterCourses : nonSemesterCourses;

                if (courses[selectedCourseType]) {
                    const subDropdown = document.createElement('select');
                    subDropdown.name = 'course'; // Updated to 'course' to pass the data correctly
                    courses[selectedCourseType].forEach(course => {
                        const option = document.createElement('option');
                        option.value = course;
                        option.text = course;
                        subDropdown.appendChild(option);
                    });
                    subDropdownContainer.appendChild(subDropdown);
                }
            });
        });
    </script>
</body>
</html>
