<?php
# Turn display error on , debug only
// ini_set('display_errors', 1);

require_once './config/database.php';
require_once './admin/scripts/read.php';

  if (isset($_GET['filter'])) {
      $filter = $_GET['filter'];
      $getMovies = getMoviesbyGenre($filter);
  } else {
      $getMovies = getAllMovies();
  }
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
   <li><a href="index.php?filter=action">Action</a></li>
   <li><a href="index.php?filter=comedy">Comedy</a></li>
   <li><a href="index.php?filter=family">Fmaily</a></li>
   <li><a href="index.php">All</a></li>
   
    </ul>
    </header>

 <?php foreach ($getMovies as $movie):?>
    <div class="movie-item">
    <img src="images/<?php echo $movie['movies_cover']; ?>" alt="<?php echo $movie['movies_title']; ?> cover Image">

    <h2><?php echo $movie['movies_title']; ?></h2>

    <h4>Movie Released: <?php echo $movie['movies_release']; ?></h4>
    <p><?php echo $movie['movies_storyline']; ?></p>
    <a href="details.php?id=<?php echo $movie['movies_id'];?>">More details...</a>
    </div>
    <?php endforeach;?>

    
<footer>
<p>Copyright &#xA9; <?php echo date('Y');?>
</p>
</footer>

</body>
</html>