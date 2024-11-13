<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $time_slot = $_POST['time_slot'];
    $mode_of_appointment = $_POST['mode_of_appointment'];

    // Prepare the SQL statement with user_id
    $stmt = $conn->prepare("INSERT INTO appointments (date, department, doctor, time_slot, mode_of_appointment, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $date, $department, $doctor, $time_slot, $mode_of_appointment, $user_id);

    if ($stmt->execute()) {
        header("Location: after_appointment.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please log in to book an appointment.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare Website</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #74c1cec8;
    }

    .main-content {
      display: flex;
      justify-content: space-between;
      padding: 50px 20px;
    }

    .left-content {
      max-width: 100%;
      margin-top: 130px;
      margin-left: 60px;
      margin-bottom: auto;
    }

    .container1 {
      max-width: 600px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #008080;
    }

    label {
      font-weight: bold;
    }

    input[type="date"],
    select,
    input[type="submit"] {
      width: calc(100% - 22px); /* Subtract padding and border width */
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box; /* Include padding and border in width calculation */
    }

    input[type="submit"] {
      background-color: #008080;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #006666;
    }

    .right-content {
      max-width: 50%;
      margin-top: 100px;
      margin-bottom: auto;
      text-align: center;
      margin-right: 45px;
    }

    .hospital-stats {
      background-color: #3c4a5ef1;
      border-radius: 5px;
      border: 6px solid rgb(50, 50, 50);
      color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      height: 100px;
      margin-top: -4px;
    }

    .info-bar {
      display: flex;
      justify-content: space-around;
      padding: 0px;
    }

    .info-item {
      text-align: center;
    }

    .button {
      margin-top: 20px;
      border-radius: 5px;
      color: white;
      font-size: 1em;
      font-weight: bold;
      height: 50px;
      width: 150px;
      background-color: #3c4a5ef1;
      border: 6px solid rgb(50, 50, 50);
      cursor: pointer;
    }

    .button:hover {
      background-color: #74c1cec8; 
    }

    header {
      background-color: #3c4a5ef1;
      padding: 20px 0;
      position: fixed;
      top: 0;
      width: 100%;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .logo img {
      float: left;
      width: 40px;
      height: 40px;
      margin-right: 10px;
    }

    .logo-text {
      font-size: 24px;
      color: #fff;
      margin-right: 10px;
    }

    .profile-dropdown {
      position: relative;
      display: inline-block;
    }

    .profile-dropdown-content {
      display: none;
      position: absolute;
      background: #3c4a5ef1;
      min-width: 160px;
      z-index: 1;
      right: 0;
    }

    .profile-dropdown-content a {
      color: #fff;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .profile-dropdown-content a:hover {
      background: #74c1cec8;
      color: white;
    }

    .profile-dropdown:hover .profile-dropdown-content {
      display: block;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        align-items: flex-start;
      }

      .logo-text {
      font-size: 24px;
      color: #fff;
      margin-right: 10px; 
      /* margin-top: -2px; */
    }

      .nav-links {
        margin-top: 10px;
      }

      .nav-links li {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .menu-bar {
        display: block;
      }

      .nav-links {
        display: none;
      }

      .nav-links.active {
        display: flex;
        flex-direction: column;
      }
    }



    .menu-bar {
      display: none;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }

    .menu-bar:hover {
      
      color: #74c1cec8;
      border-radius: 10px;
      border: 10px;
    }
    nav {
      display: flex;
      align-items: center;
    }

    .profile-dropdown, .search-bar {
      margin-left: 20px;
    }

    .nav-links {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .nav-links li {
      margin-right: 20px;
    }

    .nav-links li a {
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }

    .nav-links li a:hover {
      /* background-color: #74c1cec8; */
      color: #74c1cec8;
      border-radius: 5px;
      
    }

    .search-bar {
      margin-left: auto;
    }

    .search-bar input[type="text"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .search-bar button {
      padding: 8px 15px;
      
      background-color: #74c1cec8;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .search-bar button:hover {
      
      background-color: #74c1cec8;
    }


    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        align-items: flex-start;
      }

      .logo-text {
        margin-right: 0; 
      }

      .search-bar {
        margin-top: 10px;
        margin-left: 0;
      }

      .nav-links {
        margin-top: 10px;
      }

      .nav-links li {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .menu-bar {
        display: block;
      }

      .nav-links {
        display: none;
      }

      .nav-links.active {
        display: flex;
        flex-direction: column;
      }

    }


  </style>
</head>
<body>
  <header id="navbar">
    <div class="container">
      <div class="logo">
        <img src="logo1.jpg" alt="Healthcare Logo">
        <span class="logo-text">HealthCare</span>
      </div>
      <nav>
          <ul class="nav-links">
            <li><a href="welcome.php">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="reports.html">Reports</a></li>
            <li><a href="about.html">About Us</a></li>
  
          </ul>
         
          <div class="search-bar">
            <input type="text" placeholder="Search">
            <button type="submit">Search</button>
          </div>
        <div class="profile-dropdown">
            <img src="profilelogo.png" alt="Profile" width="40" height="40">
            <div class="profile-dropdown-content">
              
              <a href="book_appointment.php">Book Appointment</a>
              <a href="reports.html">Reports</a>
              <a href="diagnosis.html">Diagnosis Center</a>
              <a href="#">Medicines</a>      
              <a href="healthtips.html">Health Tips</a> 
              <a href="#">Settings</a>     
              <a href="#">Contact</a>
              <a href="login.php">Logout</a>
            </div>
          </div>
      </nav>
    </div>
  </header>

  <div class="main-content">
    <div class="left-content">
      <div class="container1">
        <h1>Book Appointment</h1>
        <form id="appointmentForm" action="book_appointment.php" method="POST">
          <label for="date">Select Date:</label>
          <input type="date" id="date" name="date" required>
          
          <label for="department">Select Department:</label>
          <select id="department" name="department">
            <option value="cardiology">Cardiology</option>
            <option value="orthopedics">Orthopedics</option>
            <option value="dermatology">Dermatology</option>
            <!-- Add more departments as needed -->
          </select>
          
          <label for="doctor">Select Doctor:</label>
          <select id="doctor" name="doctor">
            <option value="Dr.Vipan">Dr.Vipan</option>
            <option value="Dr.Manish">Dr.Manish</option>
            <option value="Dr.Ganpati">Dr.Ganpati</option>
            <!-- Doctors will be dynamically populated based on department selection -->
          </select>
          
          <label for="time">Select Time Slot:</label>
          <select id="time" name="time_slot">
            <option value="9:00AM">9:00 AM</option>
            <option value="10:00AM">10:00 AM</option>
            <option value="11:00AM">11:00 AM</option>
            <!-- Add more time slots as needed -->
          </select>

          <label for="mode_of_appointment">Mode Of Appointment:</label>
          <select id="mode_of_appointment" name="mode_of_appointment">
            <option value="Physically">Physically</option>
            <option value="Video Call">Video Call</option>
            <option value="Audio Call">Audio Call</option>
            <!-- Add more departments as needed -->
          </select>
          
          <input type="submit" value="Book Appointment">
        </form>
        <!-- <button class="button" onclick="openappointment()">Book Now</button> -->
      </div>
    </div>

    <div class="right-content">
      <img id="doctor" src="doctorcutout.png" alt="Doctor Cutout" style="max-width: 100%; height: 450px;">
      <div class="hospital-stats">
        <div class="info-bar">
          <div class="info-item">
            <h2>50+</h2>
            <p>Doctors</p>
          </div>
          <div class="info-item">
            <h2>5</h2>
            <p>Clinics</p>
          </div>
          <div class="info-item">
            <h2>12</h2>
            <p>Surgery Rooms</p>
          </div>
          <div class="info-item">
            <h2>100+</h2>
            <p>Patient Capacity</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openappointment() {
      window.open('bookappointment.html', '_self');
    }
  </script>
</body>
</html>
