<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare Website</title>
  <style>
     /* ...existing styles... */

     body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      
       background-color: #74c1cec8;
    }

    /* New body section styles */
    .main-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px 20px;
    }

    .left-content {
      font-size: 4em;
      font-weight: bold;
      color: #333;
      max-width: 50%;
      margin-top: -400px;
      margin-left: 40px;
    }

    .right-content {
      text-align: center;
      max-width: 50%;
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
      margin-top: -4px;
      height: 100px;
    }

    .stat-item {
      margin-bottom: 10px;
    }

    .stat-title {
      font-weight: bold;
      color: #333;
    }

    .stat-value {
      color: #4CAF50;
    }








    /* body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #0cec6260;
    } */

    header {
      /* background-color: #0af335f4; */
      
      background-color: #3c4a5ef1;
      padding: 20px 0;
      /* position: -webkit-sticky; For Safari */

    }
    .sticky {
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



    .logo {
      display: flex;
      align-items: center;
      float: left;
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

    .menu-bar {
      display: none;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }

    .menu-bar:hover {
      color: #74c1cec8;
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
      color: #74c1cec8;
      /* color: #fff; */
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

    .profile-dropdown {
      position: relative;
      display:inline-block;
      margin-right: 10px;
    }

    .profile-dropdown-content {
      display: none;
      position: absolute;
      /* background: #74c1cec8;  */
      background: #3c4a5ef1;
      /* background-color: #3c4a5ef1; */
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
      /* background: #3c4a5ef1;  */
      background: #74c1cec8;
      /* background-color: #74c1cec8; */
      color: white;
    }

    .profile-dropdown:hover .profile-dropdown-content {
      display: block;
    }
    #doctor{
        margin-top: 5px;
        margin-right: 20px;
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


.info {
    display: flex;
    justify-content: space-between;
    float: left;
    margin-top: 200px;
    margin-left: -850px;
}

.icon {
   font-size: 24px;
   
}
#calendar{
  height: 20px;
   width: 20px; 
}
#shield{
  height: 20px;
   width: 20px; 
}
#user{
  height: 20px;
   width: 20px; 
}
#location{
  height: 20px;
   width: 20px; 
}

.small {
   font-size: 20px; 
}
.right{
  margin-left: 70px;
  
}
.left p{
  font-size: 1.5em;
  font-weight: bold;
  color: #333;
}
.right p{
  font-size: 1.5em;
      font-weight: bold;
      color: #333;
}
.button{
  margin-top: 600px;
margin-left: -560px;
border-radius: 5px;
color: white;
font-size: 1em;
font-weight: bold;
height: 50px;
width: 150px;

background-color: #3c4a5ef1;
border: 6px solid rgb(50, 50, 50);
opacity: 1; /* Initial opacity */
  transition: background-color 0.3s; /* Smooth transition */
}

.button:hover {
  background-color: #74c1cec8; 
  opacity: 1; /* Full opacity on hover */
}


.small{
  margin-left: 100%;
}
.info-bar{
display: flex;
    justify-content: space-around;
    padding: 20px;
    margin: -25px;

}

.info-item {
    text-align: center;
  }


 
  </style>
</head>
<body>
  <header id="navbar">
    <div class="container">
      <div class="logo">
        <div class="menu-bar">☰</div>
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
          <h4><?php echo htmlspecialchars($_SESSION['username']); ?></h4>
      </nav>
      
    </div>
    
</header>





    <div class="main-content">
        <div class="left-content">
          Protect Your Life And Take Care Of Your Health
        </div>
        <!-- <div class="container">
          <h1>Protect Your Health And Take Care Of Your Health</h1> -->
          <div class="info">
              <div class="left">
                  <p><i class="icon"><img id="calendar" src="calendar.png" alt=""></i> Make An Appointment</p>
                  <small>Schedule With Your Favorite Doctor Anytime</small>
                  <p><i class="icon"><img id="user" src="user.png" alt=""></i> Find Your Best Doctor</p>
                  <small>We Provide You The Best From Best</small>
              </div>
              <div class="right">
                  <p><i class="icon"><img id="shield" src="shield.png" alt=""></i> Health Guarantee Forever</p>
                  <small>We Always Provide The Best Warranty For You</small>
                  <p><i class="icon"><img id="location" src="location.png" alt=""></i> Spread In Various Places</p>
                  <small>Now Clinics Are Available in Various Places</small>
              </div>
            </div>
            <div>
              <button class="button" onclick="openappointment()">BOOK NOW</button>
            </div>
            <!-- <div id="loginContainer"></div> -->
        <!-- </div> -->
      
        <div class="right-content">
          <!-- Placeholder for doctor cutout image -->
          <img id="doctor" src="doctorcutout.png" alt="Doctor Cutout" style="max-width: 100%; height: 450px;">
    
          <!-- Hospital stats -->
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
  <script>
    // JavaScript to toggle navigation links for smaller screens
    const menuBar = document.querySelector('.menu-bar');
    const navLinks = document.querySelector('.nav-links');

    menuBar.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
    function openappointment() {
            
            window.open('book_appointment.php', '_self');
        }
    


    // Get the navbar element
//var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
//var sticky = navbar.offsetTop;

// Add the sticky class when the scroll position reaches it
//function myFunction() {
//     if (window.pageYOffset >= sticky) {
//         navbar.classList.add("sticky");
//     } else {
//         navbar.classList.remove("sticky");
//     }
// }

// Execute myFunction when the user scrolls
// window.onscroll = function() {
//     myFunction();
// };

  </script>
</body>
</html>

