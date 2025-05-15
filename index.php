<!DOCTYPE html>
<html>
    <head>
        <title>Testowa strona</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link href="fontawesome.css" rel="stylesheet">
        <link href="solid.css" rel="stylesheet">
    </head>
    <body>
        <div class="top-bar">
            <ul>
                <li><img src="images/home.png" alt="Address">Dewi Sri Street. 2891, Denpasar, Bali</li>
                <li><img src="images/phone.png" alt="Phone number">(+62) 8896-2220</li>
                <li><img src="images/clock.png" alt="Clock">Everyday 24 Hours</li>
            </ul>
        </div>
        <nav>
            <div class="nav-left">
              <img src="images/logo.png" alt="Logo" class="logo">
            </div>
          
            <ul class="nav-center">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li>
                <a href="#">Pages <i class="fa-solid fa-chevron-down"></i></a>
                <ul class="dropdown">
                  <li><a href="#">Team</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">404</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Blog <i class="fa-solid fa-chevron-down"></i></a>
                <ul class="dropdown">
                  <li><a href="blog.php">Blog</a></li>
                  <li><a href="single-post.php">Single Post</a></li>
                </ul>
              </li>
              <li><a href="#">Contact</a></li>
            </ul>
          
            <div class="nav-right">
              <div class="emergency-box">
                <img src="images/phone2.png" alt="Call icon" />
                <div class="emergency-text">
                  <div class="phone-number">121-0000-200</div>
                  <div class="tagline">For Emergency!</div>
                </div>
              </div>
            </div>
          </nav>

        <main>
          <?php
          echo "test";
          $mysqli = new mysqli("localhost", "root", "", "testowa_baza");

          if ($mysqli->connect_error) {
              die("Błąd połączenia: " . $mysqli->connect_error);
          }

          $result = $mysqli->query("SELECT literka FROM alfabet WHERE id = 2");

          while ($row = $result->fetch_assoc()) {
              echo 'Literka: ' . htmlspecialchars($row['literka']) . "<br>";
          }

          $mysqli->close();

          ?>

          
        </main>
    </body>
</html>