<?php
    namespace DAO;

    use business\models\Cinema;

    interface ICinemaDAO
    {
        function Add($cinema);
        function GetAll();
        function Delete($name);
        function Update($name, $cinema);
    }
?>