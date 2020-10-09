<?php
    namespace DAO;

    use models\Movie as Movie;

    interface IMovieDAO
    {
        function Add(Movie $movie);
        function GetAll();
    }
?>