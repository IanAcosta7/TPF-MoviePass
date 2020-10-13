<?php
    namespace DAO;

    use business\models\Movie as Movie;

    interface IMovieDAO
    {
        function Add(Movie $movie);
        function GetAll();
    }
?>