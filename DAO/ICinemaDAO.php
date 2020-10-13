<?php
    namespace DAO;

    use models\Cinema;

    interface ICinemaDAO
    {
        function Add($cinema);
        function GetAll();
        function Delete($name);
        function Update();
    }
?>