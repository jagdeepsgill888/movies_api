<?php

function getAllMovies()
{
    $pdo = Database::getInstance()->getConnection();
    $queryAll = "SELECT * FROM tbl_movies";
    $runAll = $pdo->query($queryAll);
    $movies = $runAll->fetchAll(PDO::FETCH_ASSOC);

    if ($movies) {
        return $movies;
    } else {
        return 'There was a problem accessing this info';
    }
}

function getSingleMovie($id)
{
    $pdo = Database::getInstance()->getConnection();
    ## TODO: finish the line with a proper SQL query that only fetch movie for the given id
    $querySingle = 'SELECT * FROM `tbl_movies` WHERE movies_id = "'.$id.'"';
    $runSingle = $pdo->query($querySingle);
   

    if ($runSingle) {
        $movie = $runSingle->fetch(PDO::FETCH_ASSOC);
        return $movie;
    } else {
        return 'There was a problem to fetch single movie for'.$id;
    }
}
