<?php
 require_once '../load.php';
 confirm_logged_in();
 $date = date('Y-m-d H:i:s');
  ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Welcome to the admin panel</title>
 </head>
 <body>
     <h2>Welcome to the dashboard page, <?php echo $_SESSION['user_name']; ?>!</h2>
     <h2>Login time, <?php echo $_SESSION['user_date']; ?>!</h2>
     
     <a href="admin_logout.php">Sign Out</a>
 </body>
 </html>