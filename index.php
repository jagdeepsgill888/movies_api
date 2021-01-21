<?php
require_once './config/database.php';
require_once './admin/scripts/read.php';


  $getMovies = getAllMovies();
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Movies CMS</title>
</head>
<body>
    <header>
    <h2>This content could be your nav</h2>
    <ul>
   <li><a href="#">Action</a></li>
   <li><a href="#">Comedy</a></li>
   <li><a href="#">Fmaily</a></li>
   <li><a href="#">All</a></li>
   
    </ul>
    </header>

 <?php foreach ($getMovies as $movies):?>
    <div class="movie-item">
    <img src="images/<?php echo $movies['movies_cover']; ?>" alt="<?php echo $movies['movies_title']; ?> cover Image">

    <h2><?php echo $movies['movies_title']; ?></h2>

    <h4>Movie Released: <?php echo $movies['movies_release']; ?></h4>
    <p><?php echo $movies['movies_storyline']; ?></p>
    <a href="#">More details...</a>
    </div>
    <?php endforeach;?>

    
<footer>
<p>Copyright &#xA9; <?php echo date('Y');?>
</p>
</footer>

</body>
</html>