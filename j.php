<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown</title>
    <style>
                body {
      font-family: Arial, sans-serif;
     
      background-color: #f4f4f9;
      background: url('nn.png') no-repeat center center fixed;
      background-size: cover;
     padding: 0;
     margin: 0;
    }
    header.img {
        width: 100%;
        top:20px;
       
    }
    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .top-section {
      width: 100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .left,
    .right {
      width: 48%;
    }

    h1 {
      text-align: center;
      color: #4CAF50;
    }

    /* You can place your image here */
    .top-section .left {
      background-image: url("https://in.pinterest.com/pin/madurai-kamaraj-university-logo--967429563677682878/"); /* Replace the URL with the actual image URL */
      background-repeat: no-repeat;
      background-position: center; /* You can adjust the position as needed */
      background-size: contain; /* You can adjust the image size as needed */
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #4CAF50;
    }

    .form-group textarea {
      resize: vertical;
    }

    .form-group input[type="file"] {
      padding: 3px;
    }

    #dropdown-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      background: #f9f9f9;
      display: none; /* Initially hidden */
    }

    select {
      font-size: 16px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
      appearance: none;
      background: #fff url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMCIgaGVpZ2h0PSI2Ij4gPHBvbHlsaW5lIHBvaW50cz0iMCAwIDUgNiAxMCAwIj48L3BvbHlsaW5lPjwvc3ZnPg==') no-repeat right 10px center;
      background-size: 12px;
    }

    select:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
    }
        /* Your existing CSS styles */
    </style>
</head>
<body>
    <header>
        <img src="CFR.png" width="100%" alt="no image">
    </header>
                <form action="submit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="registerNumber">Register Number:</label>
                        <input type="text" id="registerNumber" name="registerNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number:</label>
                        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
                    </div>
                    <div class="form-group">
                        <label for="idCard">Upload ID Card:</label>
                        <input type="file" id="idCard" name="idCard" accept="image/*" required>
                    </div>
                
                
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date Of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea id="address" name="address" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
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
                    </div>
                
            
            
                    <label for="programType">Program Type:</label>
        <select name="programType" id="programType">
            <option value="">Select Program Type</option>
            <option value="semester">Semester</option>
            <option value="nonSemester">Non-Semester</option>
        </select>
    </div>
        <div id="dropdown-container" style="display: block;">
            <label for="main-dropdown">Course Type:</label>
            <select id="main-dropdown">
                <option value="">Select Course Type</option>
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>

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
            'Post Graduate Diplamo':['PGD in Entrepreneurship Development', 'PGD in Hospital Management', 'PGD in Journalism & Mass Communication', 'PGD in Management',
                'PGD in Marketing Management', 'PGD in NGO Management', 'PGD in Personnel Management & Industrial Relations (2 years)',
                'PGD in Public Relations Management', 'PG Dip. in International Business', 'PGDCA (Post Graduate Diploma in Computer Applications)',
                'PGD in Psychological Counselling', 'PGD in Saiva Siddhanta Philosophy', 'PGD in Travel and Tourism Management'
            ],
            'Diploma Courses':[ 'Diploma in Animation', 'Diploma in Beautician', 'Diploma in Child Care Education', 'Diploma in Desk Top Publishing', 'Diploma in Fire Safety',
                'Diploma in Health Inspector', 'Diploma in Hotel Management', 'Diploma in Nutrition and Health Education', 'Diploma in School Management',
                'Diploma in Tourism & Travel Management', 'Diploma in Yoga'
            ],
            'Certificate Courses':[ 'Certificate in Arabic', 'Certificate in Computer Application', 'Certificate in Communicative English', 'Certificate in Desk Top Publishing',
                'Certificate in Fire Safety', 'Certificate in Food & Nutrition', 'Certificate in French', 'Certificate in German', 'Certificate in GST',
                'Certificate in Hospital Assistant', 'Certificate in Library and Information Science', 'Certificate in Logistics', 'Certificate in NGO Management',
                'Certificate in Office Automation', 'Certificate in Photography', 'Certificate in Pre-Primary Education', 'Certificate in Primary Education',
                'Certificate in Refrigeration & Air Conditioning', 'Certificate in Spanish', 'Certificate in Spoken Hindi', 'Certificate in Spoken English',
                'Certificate in Teaching English', 'Certificate in Teaching Techniques', 'Certificate in Tourism and Travel Management', 'Certificate in Yoga'
           ]

        };

        const nonSemesterCourses = {
            'UG Courses(2)': ["B.A. History", "B.A. Political Science", "B.A. Tamil", "B.Litt. (Tamil)", "B.A.English", "B.A.Economics", "B.A.Social Work", "B.A.Social Science", "B.A.Journalism & Mass Communication", "B.A.Public Administration", "B.A.Urdu","B.Sc.Physics", "B.Sc.Chemistry", "B.Sc.Botany", "B.Sc.Zoology", "B.Sc.Microbiology", "B.Sc.Hotel Management & Catering Science", "B.Sc.Tourism & Hospitality Management", "B.Sc.Computer Science", "B.Sc.Nutrition and Dietetics", "B.Sc.Environmental Science", "B.Sc.Visual Communication", "B.Sc.Psychology", "B.Sc.Yoga", "B.Sc.Mathematics","B.Com.Computer Application", "B.Com.Information Technology", "B.Com.","B.B.A.", "B.B.A.Retail", "B.B.A.Computer Application","B.C.A.", "B.C.A Lateral Entry", "B.C.A Direct II Year","B.C.A.", "B.C.A Lateral Entry", "B.C.A Direct II Year"],
            'PG cources(2)':["M.A.English Language and Linguistics", "M.A.Human Rights", "M.A.Women's Studies", "M.A.Journalism and Mass Communication", "M.A.Advertising and Public Relations", "M.A.Lateral Entry", "M.A.Social Work", "M.A.Other Subjects","M.Com.Finance", "M.Com.Banking", "M.Com.Co-operative Management", "M.Com.Marketing", "M.Com.Computer Application","M.Sc.Financial Management", "M.Sc.Marketing Management", "M.Sc.Human Resource Management", "M.Sc.Systems Management", "M.Sc.Retail Management", "M.Sc.International Business Management", "M.Sc.Tourism & Hotel Management", "M.Sc.Hospital Management", "M.Sc.Operations and Project Management", "M.Sc.Airline & Airport Management", "M.Sc.Logistic & Supply Chain Management","M.Sc.Mathematics", "M.Sc.Psychology", "M.Sc.Nutrition and Food Technology", "M.Sc.Physics", "M.Sc.Chemistry", "M.Sc.Electronics and Communication", "M.Sc.Botany", "M.Sc.Zoology", "M.Sc.Computer Science", "M.Sc.Hotel Management & Catering Science", "M.Sc.Tourism & Hospitality Management","M.L.I.Sc. (1 Year)"],
            'PG Diplamo(2)':[ "Information and Communication Laws",
            "Labour Laws & Administrative Law",
            "Consumer Laws",
            "School Administrative",
            "Retail Management",
            "Management",
            "Marketing Management",
            "Hospital Management",
            "Entrepreneurship Development",
            "NGO Management",
            "Public Relation Management",
            "Criminology & Police Administration",
            "Journalism and Mass Communication",
            "Advertising and Public Relations",
            "Guidance and Counseling",
            "Psychological Counseling",
            "Women's Studies",
            "Human Rights",
            "English Language Teaching",
            "Personnel Management and Industrial Relations",
            "Actuarial Management",
            "Industrial and Company Law",
            "International Business Management",
            "Indian Stock Market",
            "Retail Management",
            "Marketing Management",
            "Financial Management",
            "Systems Management",
            "Human Resource Management",
            "Operations and Project Management",
            "Logistic Supply Chain Management",
            "Computer Application (PGDCA)",
            "Health Information Management",
            "Radiography and Imaging Technology",
            "Pharmaceutical Chemistry",
            "Hospital Laboratory Technology",
            "Hospital Documentation Management",
            "Tourism Management",
            "Hotel Management",
            "Immuno Techniques",
            "Environmental Health",
            "Environmental Health & Hygiene",
            "Environmental Molecular Diagnostics",
            "Industrial Microbiology",
            "Nutrition and Dietetics",
            "Biostatistics",
            "Multimedia Technology"],
            'Diploma(2)':["Communicative and Functional English",
            "Saiva Siddhantha",
            "French",
            "Yoga",
            "Child Care Creche Management",
            "Disaster Management",
            "Computer Application(DCA)",
            "Astronomy and Astrophysics",
            "School Administration (Post B.Ed.)",
            "Pisciculture",
            "Digital Pre Press",
            "Catering Operation",
            "Front Office & Accommodation Management",
            "Food and Beverage Service",
            "Water Quality Assessment",
            "Medical Laboratory Techniques & Management",
            "Forensic Biology",
            "Recombinant DNA Technology",
            "Human Genetic Disorders",
            "Plant Tissue Culture and Nursery Technology",
            "Computer Animation"],
            'Certificate(2)':["Library Science (C.L.I.Sc.)",
            "French",
            "Child Psychology",
            "Communicative English",
            "Sericulture",
            "Mushroom Culture",
            "Vermiculture",
            "Gene Silencing",
            "Nano-Biology",
            "Safety in Research and Clinical Laboratories"] };

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
        // Your existing JavaScript code
    </script>
</body>
</html>