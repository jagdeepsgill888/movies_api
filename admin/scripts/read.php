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
