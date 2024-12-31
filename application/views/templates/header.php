<!--
*  Name: Mekides Kasse 
*  Assignment: Final MVC + AJAX
*  Purpose: Creatig dynamic pages using codeigniter framework, header.php 
-->
<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="author" content="Mekides Kasse">
     <title>CodeIgniter Tutorial</title>
     <link href="/assets/css/main.css" rel="stylesheet">
     <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
   </head>
   <body>
      <header>
        <nav class="navbar">
        <div class="menu-toggle">☰</div>
           <ul class="menu-links">
              <li><a href="/home">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/news">News</a></li>
              <li><a href="/nyt">Top Stories</a></li>
              <li><a href="/contact">Contact Us</a></li>
           </ul>
        </nav>
      </header>
        
      <main class="container">
         <h1><?= $title; ?></h1>
         <p>