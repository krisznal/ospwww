<?php
require_once "database.php";
require_once "functions.php";

$id = (int)$_GET["id"];

$result = getSinglePost($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single post</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="top-bar">
        <ul>
            <li><img src="images/home.png" alt="Address">Dewi Sri Street. 2891, Denpasar, Bali</li>
            <li><img src="images/phone.png" alt="Phone number">(+62) 8896-2220</li>
            <li><img src="images/clock.png" alt="Clock">Everyday 24 Hours</li>
        </ul>
    </div>
      <?php
      $menu = getStructurizedNavigationItems();
      ?>
      <nav>
          <div class="nav-left">
              <img src="images/logo.png" alt="Logo" class="logo">
          </div>
          <?php renderMenu(null, $menu); ?>
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
        <div class="post-header">
            <div class="overlay">
              <h1 class="post-title"><?php echo $result['title'];?></h1>
              <div class="post-meta">
                <img src="images/user.png" alt="Author icon" />
                <span class="author"><?php echo $result['author'];?></span>
                <img src="images/calendar.png" alt="Date icon" />
                <span class="date">September 22, 2021</span>
              </div>
            </div>
        </div>
        <main class="post-content">
          <section class="post-body">
            <img src="images/photo2.jpg" alt="Firefighter driving" class="post-image" />

            <h2 class="post-subheading">The Importance Of Calling The Fire Department For Safety</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur...</p>

            <h2 class="post-subheading">Our Rescue That Makes You Satisfied</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...</p>

            <div class="post-highlight">
              <img src="images/photo3.jpg" alt="Fire rescue" />
              <ul>
                <li><span class="icon">▶</span> Over 250,000 cleans</li>
                <li><span class="icon">▶</span> Department Information</li>
                <li><span class="icon">▶</span> Public Education</li>
                <li><span class="icon">▶</span> Strategic Plan</li>
                <li><span class="icon">▶</span> Strategic Plan</li>
                <li><span class="icon">▶</span> Fire Alarm Inspection</li>
                <li><span class="icon">▶</span> 24/7 Available to Service</li>
              </ul>
            </div>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...</p>
          </section>

          <div class="post-footer">
            <div class="tags">
              <strong>Tags :</strong> Fire
            </div>
            <div class="share">
              <strong>Share This :</strong>
              <a href="#"><img src="images/facebook.png" alt="Facebook" /></a>
              <a href="#"><img src="images/twitter.png" alt="Twitter" /></a>
              <a href="#"><img src="images/linkedin.png" alt="LinkedIn" /></a>
              <a href="#"><img src="images/youtube.png" alt="Youtube" /></a>

            </div>
          </div>
        </main>
    </main>
</body>
</html>