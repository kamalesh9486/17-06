<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <style>body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background: url('nn.png') no-repeat center center fixed;
  background-size: cover;
}

header {
  position: sticky;
  top: 0;
  width: 100%;
  background-color: rgba(192, 186, 241, 0.9);
  z-index: 1000;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
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
  position: fixed;
  top:250px; /* Adjusted to start below the header */
  left: 0;
  width: 250px;
  background-color: rgba(17, 98, 179, 0.8); /* Semi-transparent background */
  color: #ffffff;
  padding: 20px;
  box-shadow: 2px 0 5px rgba(88, 240, 146, 0.5);
  display: none; /* Hidden by default */
  z-index: 1000; /* Ensure it's above other elements */
}

.dashboard.open {
  display: block; /* Show when toggled */
}

.dashboard h2 {
  margin-top: 0;
  border-radius: 5px;
}

.dashboard-button {
  display: block;
  width: 100%;
  padding: 10px;
  margin: 0 0 10px 0;
  background-color: rgba(192, 186, 241, 0.9);
  color: #ffffff;
  border: none;
  cursor: pointer;
  font-size: 16px;
  border-radius: 5px;
}

.dashboard-button:hover {
  background-color: #71eb8c;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav ul li {
  margin: 0 10px;
}

nav ul li a {
  text-decoration: none;
  color: #003366;
  padding: 10px 15px;
}

nav ul li a:hover {
  background-color: #f0f0f0;
  border-radius: 5px;
}

.section {
  padding: 60px 20px;
  background-color: rgba(255, 255, 255, 0.8);
}

.hero {
  text-align: center;
  padding: 100px 20px;
  color: white;
  background-color: rgba(0, 0, 0, 0.5);
}

.hero h1 {
  font-size: 48px;
  margin-bottom: 20px;
}

.hero p {
  font-size: 24px;
  margin-bottom: 40px;
}

.hero .btn {
  background-color: #28a745;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  font-size: 18px;
}

.hero .btn:hover {
  background-color: #218838;
}

.btn {
  display: inline-block;
  background-color: #003366;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  font-size: 18px;
}

.btn:hover {
  background-color: #00509E;
}

footer {
  background-color: #003366;
  color: white;
  padding: 20px 0;
  text-align: center;
}

footer a {
  color: #ffcc00;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

footer .social-media {
  list-style-type: none;
  margin: 20px 0 0;
  padding: 0;
  display: flex;
  justify-content: center;
}

footer .social-media li {
  margin: 0 10px;
}

footer .social-media li a img {
  width: 24px;
  height: 24px;
}
</style>
</head>
<body>
  <header>
    <img src="CFR.png" width="100%" alt="no image">
    <div class="container">
      <button id="toggleButton">☰</button>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#academics">Academics</a></li>
          <li><a href="#admissions">Admissions</a></li>
          <li><a href="#research">Research</a></li>
          <li><a href="#student-life">Students</a></li>
          <li><a href="#news">News</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <div id="dashboard" class="dashboard">
    <h2>Dashboard</h2>
    <button class="dashboard-button" id="button1">Student Grievance</button>
    <button class="dashboard-button" id="button2">Grievance Status</button>
    <button class="dashboard-button">Faculties</button>
    <button class="dashboard-button">Exams</button>
    <button class="dashboard-button">Administration</button>
    <button class="dashboard-button">Library</button>
  </div>
  
  <section id="home">
    <div class="hero">
      <h1>Welcome to Our University</h1><br><br>
    </div>
  </section>

  <section id="about" class="section">
    <div class="container">
      <h2>About Us</h2>
      <p>Learn more about our history, mission, and values.</p>
      <a href="about.html" class="btn">Read More</a>
    </div>
  </section>

  <section id="academics" class="section">
    <div class="container">
      <h2>Academics</h2>
      <p>Discover our wide range of academic programs and resources.</p>
      <a href="academics.html" class="btn">Explore Programs</a>
    </div>
  </section>

  <section id="admissions" class="section">
    <div class="container">
      <h2>Admissions</h2>
      <p>Find out how to apply, tuition fees, and financial aid options.</p>
      <a href="admissions.html" class="btn">Learn More</a>
    </div>
  </section>

  <section id="research" class="section">
    <div class="container">
      <h2>Research</h2>
      <p>Explore our cutting-edge research initiatives and opportunities.</p>
      <a href="research.html" class="btn">Discover Research</a>
    </div>
  </section>

  <section id="student-life" class="section">
    <div class="container">
      <h2>Student Life</h2>
      <p>Experience vibrant campus life through various activities and organizations.</p>
      <a href="student-life.html" class="btn">Get Involved</a>
    </div>
  </section>

  <section id="news" class="section">
    <div class="container">
      <h2>News</h2>
      <div class="news-item">
        <h3>Latest News Title</h3>
        <p>Summary of the latest news.</p>
        <a href="news.html" class="btn">Read More</a>
      </div>
      <div class="news-item">
        <h3>Another News Title</h3>
        <p>Summary of another news article.</p>
        <a href="news.html" class="btn">Read More</a>
      </div>
    </div>
  </section>

  <section id="events" class="section">
    <div class="container">
      <h2>Events</h2>
      <div class="event-item">
        <h3>Upcoming Event Title</h3>
        <p>Details about the upcoming event.</p>
        <a href="events.html" class="btn">Find Out More</a>
      </div>
      <div class="event-item">
        <h3>Another Event Title</h3>
        <p>Details about another event.</p>
        <a href="events.html" class="btn">Find Out More</a>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2024 MKU. All rights reserved.</p>
      <p>Contact us: <a href="mailto:info@university.com">mkuniversity.ac.in</a></p>
      <ul class="social-media">
        <li><a href="#"><img src="facebook_icon.png" alt="Facebook"></a></li>
        <li><a href="#"><img src="twitter_icon.png" alt="Twitter"></a></li>
        <li><a href="#"><img src="instagram_icon.png" alt="Instagram"></a></li>
        <li><a href="#"><img src="linkedin_icon.png" alt="LinkedIn"></a></li>
      </ul>
    </div>
  </footer>

  <script>
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
  </script>
</body>
</html>
