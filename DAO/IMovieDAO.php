<?php
    namespace DAO;

    use modelsBusinessObject\Movie as Movie;

    interface IMovieDAO
    {
        function Add(Movie $movie);
        function GetAll();
    }
?>