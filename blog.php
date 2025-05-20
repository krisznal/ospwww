<?php
require_once "database.php";
require_once "classes.php";
$dbConnection = new DatabaseConnection("localhost", "www", "password", "ospwww");
$blogRepository = new BlogPosts($dbConnection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
<!--- --->
    <title>blog</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
</head>
<body>
      <?php require_once "header.php"; ?>
      <main>
        <header class="blog-header">
            <div class="overlay"></div>
            <div class="header-content">
            <h1>Blog</h1>
            <p><a href="index.php">Home</a> &gt; <span>Blog</span></p>
            </div>
        </header>

        <section class="blog-intro">
            <p class="blog-subtitle">Blog & Articles</p>
            <h2 class="main-title">Latest Blog</h2>
            <p class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </section>
         <section class="blog-section">
             <?php foreach ($blogRepository->getList() as $blog): ?>
                <div class="blog-post">
                   <img src="images/photo2.jpg" alt="Post 1">
                   <div class="blog-post-content">
                       <h2 class="blog-post-title"><?php echo $blog['title'];?></h2>
                       <p class="blog-post-meta">
                           <img src="images/clock.png" alt="Clock" class="clock-icon"><?php echo date("F d, Y", strtotime($blog['created_at']));?>

                       </p>
                       <p class="blog-post-excerpt"><?php echo $blog['content'];?></p>
                       <a href="single-post.php?id=<?php echo $blog['id'];?>" class="read-more">Read More</a>
                   </div>
                </div>
             <?php endforeach; ?>
         </section>
        </main>
</body>
</html>