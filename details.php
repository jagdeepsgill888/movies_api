<?php
require_once './config/database.php';
require_once './admin/scripts/read.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $movie = getSingleMovie($id);
}


 
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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

 <?php if (!empty($movie)):?>
    <div class="movie-item">
    <img src="images/<?php echo $movie['movies_cover']; ?>" alt="<?php echo $movie['movies_title']; ?> cover Image">

    <h2><?php echo $movie['movies_title']; ?></h2>

    <h4>Movie Released: <?php echo $movie['movies_release']; ?></h4>
    <p><?php echo $movie['movies_storyline']; ?></p>
    <a href="#">More details...</a>
    </div>

    <?php else:?>
    <p>There isnt such a movie</p>
    <?php endif;?>

    
<footer>
<p>Copyright &#xA9; <?php echo date('Y');?>
</p>
</footer>

</body>
</html>